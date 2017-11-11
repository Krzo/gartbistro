<?php
session_start();
if(!isset($_SESSION['logged'])) {
  header ("Location: http://www.gartbistro.at/gartbistro/admin.php");
}
?>
    <html>

    <head>
        <meta charset="utf-8">
        <title>Gart Bistro Speisekarte bearbeiten</title>
        <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />
        <script src="https://cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.10.15/js/dataTables.bootstrap.min.js"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/css/bootstrap-datepicker.css" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/js/bootstrap-datepicker.js"></script>
        <!-- MDBOOTSTRAP -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.3.2/js/mdb.min.js"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.3.2/css/mdb.min.css" />
        <style>
            body {
                overflow-y: scroll;
                margin: 0;
                padding: 0;
                background-color: #f1f1f1;
                background-color: #fff;
            }
            
            .box {
                width: 1300px;
                padding: 20px;
                border: 1px solid #ccc;
                border-radius: 5px;
                margin-top: 25px;
                box-sizing: border-box;
            }
            
            th {
                color: #ffffff;
            }
        </style>
    </head>

    <body>
        <div class="container">
            <h1 align="center">Gart Bistro Speisekarte bearbeiten</h1>
            <p align="center"> Kategorien: 1 - Döner, 2 - Pizza, 3 - Burger,4 - Empfehlung des Hauses, 5 - Salate, 6 - Getränke </p>
            <div id="alert_message"></div>
            <div class="table-responsive">
                <div align="right">
                    <button type="button" name="add" id="add" class="btn btn-success">Hinzufügen</button>
                </div>
                <div align="left">
                    <form method="post" action="logout.php">
                        <button type="submit" name="sent" id="add" class="btn btn-info">Ausloggen</button>
                    </form>
                </div>
                <table id="foodTable" class="table table-hover">
                    <thead class="mdb-color green darken-3">
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Preis</th>
                            <th>Kategorie</th>
                            <th>Beschreibung</th>
                            <th></th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </body>

    </html>
    <script type="text/javascript" language="javascript">
        $(document).ready(function () {
            //Einstellungen für die Tabelle (Sprache, Texte, etc..)
            fetch_data();
            
            function fetch_data() {
                $.fn.dataTable.ext.errMode = 'throw';
                $('#foodTable').DataTable({
                    "processing": true, 
                    "serverSide": true,
                    "order": [], 
                    "sAjaxDataProp": "data",
                    "ajax": {
                        url: "fetch.php", 
                        type: "POST"
                    }, 
                    "language": {
                        "search": "Suchen:",
                        "lengthMenu": "_MENU_ Einträge anzeigen",
                        "info": "Zeige _START_ bis _END_ von _TOTAL_ Einträgen", 
                        "zeroRecords": "Keine Einträge gefunden", 
                        "paginate": {
                            "first": "Erste", 
                            "last": "Letzte", 
                            "next": "Nächste", 
                            "previous": "Vorherige"
                        }, 
                    }
                });
            }

            function update_data(id, column_name, value) {
                $.ajax({
                    url: "update.php"
                    , method: "POST"
                    , data: {
                        id: id
                        , column_name: column_name
                        , value: value
                    }
                    , success: function (data) {
                        $('#alert_message').html('<div class="alert alert-success">' + data + '</div>');
                        $('#foodTable').DataTable().destroy();
                        fetch_data();
                    }
                });
                setInterval(function () {
                    $('#alert_message').html('');
                }, 15000);
            }
            $(document).on('blur', '.update', function () {
                var id = $(this).data("id");
                var column_name = $(this).data("column");
                var value = $(this).text();
                update_data(id, column_name, value);
            });
            $('#add').click(function () {
                var html = '<tr>';
                html += '<td contenteditable id="data1"></td>';
                html += '<td contenteditable id="data2"></td>';
                html += '<td contenteditable id="data3"></td>';
                html += '<td contenteditable id="data4"></td>';
                html += '<td contenteditable id="data5"></td>';
                html += '<td><button type="button" name="insert" id="insert" class="btn btn-success btn-xs">Hinzufügen</button></td>';
                html += '</tr>';
                $('#foodTable tbody').prepend(html);
            });
            $(document).on('click', '#insert', function () {
                var food_name = $('#data2').text();
                var food_price = $('#data3').text();
                var food_category = $('#data4').text();
                var food_description = $('#data5').text();
                if (food_name != '' && food_price != '' && food_category != '') {
                    $.ajax({
                        url: "insert.php"
                        , method: "POST"
                        , data: {
                            food_name: food_name
                            , food_price: food_price
                            , food_category: food_category
                            , food_description: food_description
                        }
                        , success: function (data) {
                            $('#alert_message').html('<div class="alert alert-success">' + data + '</div>');
                            $('#foodTable').DataTable().destroy();
                            fetch_data();
                        }
                    });
                    setInterval(function () {
                        $('#alert_message').html('');
                    }, 15000);
                }
                else {
                    alert("Name, Preis und Kategorie sind notwendig.");
                }
            });
            $(document).on('click', '.delete', function () {
                var id = $(this).attr("id");
                if (confirm("Sind Sie sich sicher, dass Sie diesen Eintrag löschen wollen?")) {
                    $.ajax({
                        url: "delete.php"
                        , method: "POST"
                        , data: {
                            id: id
                        }
                        , success: function (data) {
                            $('#alert_message').html('<div class="alert alert-success">' + data + '</div>');
                            $('#foodTable').DataTable().destroy();
                            fetch_data();
                        }
                    });
                    setInterval(function () {
                        $('#alert_message').html('');
                    }, 15000);
                }
            });
        });
    </script>