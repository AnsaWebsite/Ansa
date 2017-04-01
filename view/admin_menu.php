<html>
<head>
    <title>Live Table Data Edit</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css"/>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/jquery.min.js"></script>
</head>
<body>
<div class="container">
    <br/>
    <br/>
    <br/>
    <div class="table-responsive">
        <h3 align="center">Live Table Add Edit Delete using Ajax Jquery in PHP Mysql</h3><br/>

        <div id="live_data"></div>


    </div>

</div>
</body>
</html>

<script>
    $(document).ready(function () {
        function fetch_data() {
            $.ajax({
                url: "../model/select.php",
                method: "POST",
                success: function (data) {
                    $('#live_data').html(data);
                }
            });
        }

        fetch_data();
        $(document).on('click', '#btn_add', function () {

            var sno = $('#id').text();
            var dish_name = $('#dish_name').text();
            var image = document.getElementById('imgDish').src;
            var price = $('#price').text();


            if (sno == '') {
                alert("Enter S NO Name");
                return false;
            }


            if (dish_name == '') {
                alert("Enter Dish Name");
                return false;
            }

            if (image == '') {
                alert("Upload  Image");
                return false;
            }
            if (price == '') {
                alert("Enter Price");
                return false;
            }
            $.ajax({
                url: "../model/insert.php",
                method: "POST",
                data: {id: sno, dish_name: dish_name, image: image, price: price},
                dataType: "text",
                success: function (data) {
                    alert(data);
                    fetch_data();
                }
            });
        });

        function edit_data(id, text, column_name) {
            $.ajax({
                url: "../model/edit.php",
                method: "POST",
                data: {id: id, text: text, column_name: column_name},
                dataType: "text",
                success: function (data) {
                    alert(data);
                    fetch_data();

                }
            });
        }

        $(document).on('blur', '.idvalue', function () {
            var id = $(this).data("id1");
            var idval = $(this).text();
            edit_data(id, idval, "id");
        });
        $(document).on('blur', '.dish_name', function () {
            var id = $(this).data("id2");
            var dish_name = $(this).text();

            edit_data(id, dish_name, "dish_name");

        });
        $(document).on('blur', '.image', function () {
            var id = $(this).data("id3");
            var image = $(this).text();
            edit_data(id, image, "image");

        });
        $(document).on('blur', '.price', function () {
            var id = $(this).data("id4");
            var price = $(this).text();
            edit_data(id, price, "price");

        });

        $(document).on('click', '.btn_delete', function () {
            var id = $(this).data("id5");
            if (confirm("Are you sure you want to delete this?")) {
                $.ajax({
                    url: "../model/delete.php",
                    method: "POST",
                    data: {id: id},
                    dataType: "text",
                    success: function (data) {
                        alert(data);
                        fetch_data();
                    }
                });
            }
        });













    });

</script>