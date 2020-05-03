<?php

namespace App\Console;

use App\myClass\TaskCron\TaskCronCloudFlare;
use App\myClass\TaskCron\TaskCronCommande;
use App\myClass\TaskCron\TaskCronDomaine;
use App\myClass\TaskCron\TaskCronHebergement;
use App\myClass\TaskCron\TaskCronMonitoring;
use App\myClass\TaskCron\TaskCronSupport;
use App\myClass\TaskCron\TaskCronWatcher;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        //
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {

        $schedule->call(function () {

            // Pour test
            // TaskCronMonitoring::check();
        })->everyMinute();

        $schedule->call(function () {

            // Fermeture de ticket si pas de reponse apres 72h
            TaskCronSupport::closeTicket();

            // Mise a jour des données de chaque domaine
            TaskCronCloudFlare::UpdateZone();

            // Livraison de commande payée
            TaskCronCommande::setLivraison();
        })->everyFiveMinutes();

        $schedule->call(function () {

            // Mise a jour du Screenshot des domaines
            TaskCronDomaine::UpdateScreenshot();

            // Verification de Monitoring
            TaskCronMonitoring::check();
        })->everyFifteenMinutes();

        $schedule->call(function () {

            // Verification de Monitoring
            TaskCronWatcher::check();
        })->dailyAt('02:00');

        $schedule->call(function () {

            TaskCronDomaine::UpdateExpiryDate();
            // Tache a terminer
            // TaskCronHebergement::UpdateExpiryDate();
        })->dailyAt('03:00');

        $schedule->command('telescope:clear')->dailyAt('00:00');
    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__ . '/Commands');

        require base_path('routes/console.php');
    }
}
