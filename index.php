<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Stan</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.4/css/bootstrap-select.min.css">
</head>
<body>
<?php
    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        echo "<pre>" . print_r($_POST, true) . "</pre>";
    }
?>
    <div class="container">
        <h1>Beoordelingsformulier</h1>

        <div class="row">
            <div class="col">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Kerntaak</th>
                            <th scope="col">Acties</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>Kerntaak 1</td>
                            <td>
                                <button class="btn btn-outline-danger btn-sm btndelete" data-id="1" data-toggle="modal" data-target="#delModal">Verwijderen</button>
                                <button class="btn btn-outline-warning btn-sm" data-id="1" data-toggle="modal" data-target="#editModal">Aanpassen</button>
                            </td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>Kerntaak 2</td>
                            <td>
                                <button class="btn btn-outline-danger btn-sm btndelete" data-id="2" data-toggle="modal" data-target="#delModal">Verwijderen</button>
                                <button class="btn btn-outline-warning btn-sm" data-id="2" data-toggle="modal" data-target="#editModal">Aanpassen</button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <button type="button" class="btn btn-info btnadd" data-toggle="modal" data-target="#addModal">Toevoegen</button>
    </div>

    <!-- modals -->
    <div class="modal" tabindex="-1" role="dialog" id="delModal">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Verwijderen: <strong><span id="delspanname"></span></strong></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Modal body text goes here.</p>
                </div>
                <div class="modal-footer">
                    <a type="button" class="btn btn-primary" id="delhref">Verwijderen</a>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal" tabindex="-1" role="dialog" id="addModal">
        <div class="modal-dialog" role="document">
            <form method="post" action="">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Toevoegen</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <select name="kerntaak">
                            <option value="0">-</option>
                            <option value="1">Kerntaak 1</option>
                            <option value="2">Kerntaak 2</option>
                        </select><br />
                        <select name="werkproces">
                            <option value="0">-</option>

                        </select><br />
                        <select name="criteria">
                            <option value="0">-</option>
                        </select><br />
                    </div>
                    <div class="modal-footer">
                        <input type="submit" class="btn btn-primary" value="Opslaan">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.4/js/bootstrap-select.min.js"></script>

    <script>
        $(document).ready(function() {

            // verbergen elementen
            $("select[name=werkproces]").hide();
            $("select[name=criteria]").hide();

            $(".btndelete").click(function(event) {
                // todo: bij het inladen van de modal. Alle waarden op default zetten

                event.preventDefault();

                // ophalen van de naam:
                var kerntaak = $(this).closest('td').prev('td').text();

                // ophalen van het id:
                var id = $(this).data("id");

                // link aanpassen
                $("#delhref").attr("href", "delete.php?id=" + id);

                // tekst aanpassen
                $("#delspanname").html(kerntaak);
            });

            $("select[name=kerntaak]").on("change", function() {
                // todo: bij veranderen, criteria weer op hidden zetten en leeg maken.

                // waarde van geslecteerde id ophalen
                kt = this.value;


                // Alles leeg maken:
                $("select[name=werkproces]").empty().append($('<option>', {
                    value: 0,
                    text : "-"
                }));

                // ophalen van informatie, met ajax
                $.ajax({
                    type: 'GET',
                    url: 'json.werkproces.php',
                    data: { id: kt },
                    dataType: 'json',
                    success: function (data) {
                        $.each(data, function(index, element) {
                            $("select[name=werkproces]").append($('<option>', {
                                value: element.id,
                                text : element.name
                            }));
                        });
                        // toepassen css
                        // ** material only! **
                        // $("select[name=werkproces]").material_select();
                        // als alles is opgehaald. Select weer laten zien.
                        $("select[name=werkproces]").show();
                    }
                });
            });

            $("select[name=werkproces]").on("change", function() {
                wp = this.value;

                $("select[name=criteria]").empty().append($('<option>', {
                    value: 0,
                    text : "-"
                }));

                $.ajax({
                    type: 'GET',
                    url: 'json.criteria.php',
                    data: { id: wp },
                    dataType: 'json',
                    success: function (data) {
                        $.each(data, function(index, element) {
                            $("select[name=criteria]").append($('<option>', {
                                value: element.id,
                                text : element.name
                            }));
                        });
                        //$("select[name=criteria]").material_select();
                        $("select[name=criteria]").show();
                    }
                });
            });

        });


    </script>
</body>
</html>