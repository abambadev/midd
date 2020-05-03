$('.canal-envoi').select2({
    placeholder: "Tous les canaux"
});

$('select[name=sous_categorie_id]').select2({
    placeholder: "Toutes les sous catégories"
});

$('select[name=quartier_id]').select2({
    placeholder: "Tous les quartiers"
});

$('select[name=categorie_id]').select2({
    placeholder: "Selectionnez une categorie"
}).on("change", function () {
    var $id = $(this).val();
    $.post(route, {
        id: $id,
        type: 'sous-categorie',
        _token: _token
    }).done(function (res) {
        var $select = $("select[name=sous_categorie_id]");
        $select.empty();
        $select.append('<option value="0"> --- Veuillez selectionner une sous-categorie ---</option>');
        $.map(res, function (scat, i) {
            console.log(scat);
            var $option = `<option value="${scat.id}">${scat.libelle}</option>`;
            $select.append($option);
        });
        $select.select2({
            placeholder: "Veuillez selectionnez une sous categorie"
        });
    })
});

$('select[name=pays_id]').select2({
    placeholder: "Tous les pays"
}).on("change", function () {
    var $pays_id = $(this).val();
    $.post(route, {
        id: $pays_id,
        type: 'region',
        _token: _token
    }).done(function (res) {
        var $select = $("select[name=region_id]");
        $select.empty();
        $("select[name=ville_id]").empty();
        $("select[name=quartier_id]").empty();
        $select.append('<option value="0"> --- Toutes les regions ---</option>');
        $.map(res, function (reg, i) {
            var $option = `<option value="${reg.id}">${reg.libelle}</option>`;
            $select.append($option);
        });
        $select.select2({
            placeholder: "Toutes les regions"
        });
    })
});

$('select[name=region_id]').select2({
    placeholder: "Toutes les regions"
}).on("change", function () {
    var $region_id = $(this).val();
    $.post(route, {
        id: $region_id,
        type: 'ville',
        _token: _token
    }).done(function (res) {
        var $select = $("select[name=ville_id]");
        $select.empty();
        $("select[name=quartier_id]").empty();
        $select.append('<option value="0"> --- Toutes les villes ---</option>');
        $.map(res, function (reg, i) {
            var $option = `<option value="${reg.id}">${reg.libelle}</option>`;
            $select.append($option);
        });
        $select.select2({
            placeholder: "Toutes les villes"
        });
    })
});

$('select[name=ville_id]').select2({
    placeholder: "Toutes les villes"
}).on("change", function () {
    var $ville_id = $(this).val();
    $.post(route, {
        id: $ville_id,
        type: 'quartier',
        _token: _token
    }).done(function (res) {
        var $select = $("select[name=quartier_id]");
        $select.empty();
        $select.append('<option value="0"> --- Tous les quartiers ---</option>');
        $.map(res, function (reg, i) {
            var $option = `<option value="${reg.id}">${reg.libelle}</option>`;
            $select.append($option);
        });
        $select.select2({
            placeholder: "Toutes les quartiers"
        });
    })
});
