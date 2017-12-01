<?php
    // bovenin je PHP
    // ook je includes die niets pushen naar het scherm.

    //include("check.php");
    //include("connect.php");

?>

<html>
<head>
    <meta charset="UTF-8">
    <title>MiniProeve</title>
<!--    <link type="text/css" rel="stylesheet" href="stylesheet.css">-->
    <link type="text/css" rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link type="text/css" rel="stylesheet" media="screen,projection" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.5/css/materialize.min.css" />
</head>
<body>
<?php
//include("navbar.php");
?>
<div class="row" style="margin-bottom: auto;">
    <div class="col s12 m4 l3" style="background-color: gray; height: 100%;">
        <br>
        <!-- Dropdown  -->
        <a class='dropdown-button btn' href='#' data-activates='dropdown1'>Selecteer kerntaak</a>
        <ul id='dropdown1' class='dropdown-content'>
            <li><a href="#!"></a></li>
            <li>Levert bijdrage ontwikkeltraject</li>
            <li>Realiseert en test onderdelen</li>
            <li>Levert product op</li>
        </ul><br><br>
        <!-- Dropdown -->
        <a class='dropdown-button btn' href='#' data-activates='dropdown1'>Selecteer werkproces</a>
        <ul id='dropdown1' class='dropdown-content'>
            <li><a href="#!"></a></li>
            <li>Stel de opdracht</li>
            <li>Levert bijdrage projectplan</li>
            <li>Levert bijdrage onderwerp</li>
            <li>Bereidt realisatie voor</li>
            <li>Realiseert product</li>
            <li>Test het ontwikkelde product</li>
            <li>Optimaliseer dit product</li>
            <li>Levert product op</li>
            <li>Evalueert opgeleverde product</li>
        </ul>
    </div>
    <div class="col s12 m8 l9">
        <h5>Overzicht criteria
            <a data-target="ModalAddCriterium" class="btn-floating btn-small waves-effect waves-light green btn modal-trigger"><i class="material-icons" >add</i></a></h5>
<!--        <table>-->
<!--            <thead>-->
<!--            <tr>-->
<!--                <th>Criterium</th>-->
<!--                <th>Naam</th>-->
<!--                <th></th>-->
<!--                <th></th>-->
<!--            </tr>-->
<!--            </thead>-->
<!--            <tbody>-->
<!--            --><?php
//            $get_werkproces_criterium_inhoud = "SELECT * FROM kerntaak";
//            $result_get_werkproces_criterium_inhoud = $conn->query($get_werkproces_criterium_inhoud);
//            if ($result_get_werkproces_criterium_inhoud->num_rows > 0) {
//            while ($row_get_werkproces_criterium_inhoud = $result_get_werkproces_criterium_inhoud->fetch_assoc()) {
//            ?>
<!--            <tr>-->
<!--                <td>--><?php //echo $row_get_werkproces_criterium_inhoud['kerntaak_naam']; ?><!--</td>-->
<!--                <td>--><?php //echo $row_get_werkproces_criterium_inhoud['kerntaak_omschrijving']; ?><!--</td>-->
<!--                <td><a data-target="ModalEditKerntaak" class="btn-floating btn-large waves-effect waves-light yellow btn modal-trigger"><i class="material-icons" >edit</i></a></td>-->
<!--                <td><a data-target="ModalDeleteKerntaak" class="btn-floating btn-large waves-effect waves-light red btn modal-trigger"><i class="material-icons">delete</i></a></td>-->
<!--            <tr>-->
<!--                --><?php
//                }
//                } else {
//                    echo '0 results';
//                }
//                ?>
<!--            </tbody>-->
<!--        </table>-->
    </div>
</div>

<?php
// onderin je mdals. Na je 'normale' code.
//include("ModalAddCriterium.php");

?>
<div id="ModalAddCriterium" class="modal" style="height:100%">
    <div class="modal-header">
        <h5>Criterium toevoegen</h5>
    </div>
    <div class="modal-content">
        <select name="kerntaak_criterium_option" required>
            <?php
                // hier een foreach. Geen PHP SQL dingen. Dus een functie!
                // dit natuurlijk overal
//                $kerntaken = getKerntaken();
            // [id] = Kerntaak 1
//                foreach ($kerntaken as $kt => $id) {
//                    // option value
//                }
            ?>
            <option value="1">Kerntaak 1</option>
            <option value="2">Kerntaak 2</option>
        </select>

        <select name="werkproces" class="hide">
            <option value="1">Werkproces 1</option>
            <option value="2">Werkproces 2</option>
        </select>

        <!-- CODE VOOR CRITERIUM TOEVOEGEN BACK-END -->
<!--        --><?php
//        $get_kerntaak_criterium = "SELECT * FROM kerntaak";
//        $result_kerntaak_criterium = $conn->query($get_kerntaak_criterium);
//        if ($result_kerntaak_criterium->num_rows > 0) {
//            ?>
<!--            <label>Om een criterium toe te voegen selecteerd u eerst de kerntaak en daarna het werkproces:</label>-->
<!--            <br>-->
<!--            <select name="kerntaak_criterium_option" required>-->
<!--                <option selected="selected" value="0" disabled>Kies een kerntaak</option>-->
<!--                --><?php
//                while ($row_kerntaak_criterium = $result_kerntaak_criterium->fetch_assoc()) {
//                    ?>
<!--                    <option value="--><?php //echo $row_kerntaak_criterium["kerntaak_id"] ?><!--">--><?php //echo $row_kerntaak_criterium['kerntaak_id'] . ' - ' . $row_kerntaak_criterium["kerntaak_naam"] ?><!--</option>-->
<!--                    --><?php
//                }
//                ?>
<!--            </select>-->
<!--            <select name="werkproces">-->
<!--                <option value="0">-</option>-->
<!--            </select>-->
<!--            --><?php
//        }
//        ?>
        <!--EINDE CODE VOOR CRITERIUM TOEVOEGEN BACKEND -->
    </div>
</div>

<!--EINDE CODE VOOR KLAS TOEVOEGEN BACKEND -->
<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.5/js/materialize.min.js"></script>
<script type="text/javascript">
    $(document).ready(function () {
        // the "href" attribute of .modal-trigger must specify the modal ID that wants to be triggered
        $(".modal-trigger").leanModal();
        $("select").material_select();
        $(".button-collapse").sideNav();

        //alert('alert');
        //$("select[name=werkproces]").hide();

        $("select[name=kerntaak_criterium_option]").on('change', function () {
            console.log('yay!');
            $("select[name=werkproces]").closest('.select-wrapper').removeClass("hide");
        }).material_select();

    });
</script>
</body>
</html>