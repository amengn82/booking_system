<?php
    session_start();
    if($_SESSION['username']!=='admin' && $_SESSION['password']!=='123') {
        header('location: admin_login.php');
    }  // print_r($_POST);

    include_once('./connect.php'); 
?>
<?php
    // Generate report โดยการรับค่าวันที่
    $salarydate = isset($_POST['salarydate'])?$_POST['salarydate']:'';
 
    if(isset($_GET['id'])=='') {
    $sql_payroll = "
        SELECT
            maids.maid_id, 
            maids.maid_firstname, 
            maids.maid_lastname, 
            maids.maid_salary,
            benefits.lunch_offer, 
            benefits.renthouse_offer, 
            benefits.traveling_offer,
            (maids.maid_salary*social_security/100) AS social_security_paying,
            (maids.maid_salary + benefits.lunch_offer + renthouse_offer + traveling_offer)*(withholding_tax/100) AS withholding_tax_paying,
            ((maids.maid_salary +  benefits.lunch_offer + renthouse_offer + traveling_offer) - (maids.maid_salary*social_security/100) - 
            (maids.maid_salary + benefits.lunch_offer + renthouse_offer + traveling_offer)*(withholding_tax/100)) AS income_net,
            (((maids.maid_salary +  benefits.lunch_offer + renthouse_offer + traveling_offer) - (maids.maid_salary*social_security/100) - 
            (maids.maid_salary + benefits.lunch_offer + renthouse_offer + traveling_offer)*(withholding_tax/100)) + 
            (maids.maid_salary*social_security/100)) AS company_paying
        FROM
            maids
        JOIN
            benefits ON maids.benefit_id = benefits.benefit_id
        ";
        $result = $conn->query($sql_payroll);
        //var_dump(mysqli_error($conn)); die();
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="./css/tinyslide.css">
    <script src="./js/jquery-3.6.0.min.js"></script>
    <script src="./js/tinyslide.js"></script>
    <script src="./export_excel/src/jquery.table2excel.js"></script>
    <style>
        h1.hh1 {
            text-align: center;
            color: black;
        }
        table {
            text-align: center;
            color: black;
            margin: 0px auto;
            background-color: white;
            border: black;
        }
        table, th, td {
            width: 1300px;
            border-collapse: collapse;
        }
        tr td a {
            text-decoration: none;
            color: black;
            font-weight: bold;
        }
        .export {
            margin-left: 86px;
        }
        .backclick1 {
            margin-left: 25px;
            color: black;
            text-decoration: none;
        }
    </style>
    <title>Admin zone - Payroll summary report</title>
</head>
<body>
    <?php require_once("nav_main_admin.php"); ?>
    <section id="tiny" class="tinyslide">
        <aside class="slides">
            <figure> <img src="./hotel_images/pic1.jpg" alt="">
                <figcaption> ABC Hotel </figcaption>
            </figure>
            <figure> <img src="./hotel_images/pic2.jpg" alt="">
                <figcaption> Luxury </figcaption>
            </figure>
            <figure> <img src="./hotel_images/pic3.jpg" alt="">
                <figcaption> Your dream place </figcaption>
            </figure>
        </aside>
    </section><br>
    <h1 class="hh1">Payroll summary report on <?php echo $salarydate ?></h1><br>
    <section>
        <table border=1 id="table2excel">
        <thead>
                <tr>
                    <th>Maid ID</th>
                    <th>Firstname</th>
                    <th>Lastname</th>
                    <th>Salary</th>
                    <th>Lunch offer</th>
                    <th>Rent house offer</th>
                    <th>Traveling offer</th>
                    <th>Social security paying</th>
                    <th>Withholding tax paying</th>
                    <th>Income net</th>
                    <th>Company paying (Income net and Social security)</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $total_salary=0;
                    $total_lunchpay=0;
                    $total_renthousepay=0;
                    $total_travelpay=0;
                    $total_socialsecurity=0;
                    $total_incomenet=0;
                    $total_companypay=0;
                    foreach($result as $value){
                        $total_salary = $total_salary + $value['maid_salary'];
                        $total_lunchpay = $total_lunchpay + $value['lunch_offer'];
                        $total_renthousepay = $total_renthousepay + $value['renthouse_offer'];
                        $total_travelpay = $total_travelpay + $value['traveling_offer'];
                        $total_socialsecurity = $total_socialsecurity + $value['social_security_paying'];
                        $total_incomenet = $total_incomenet + $value['income_net'];
                        $total_companypay =  $total_companypay + $value['company_paying'];
                        echo "<tr>
                                <td>{$value['maid_id']}</td>
                                <td>{$value['maid_firstname']}</td>
                                <td>{$value['maid_lastname']}</td>
                                <td>{$value['maid_salary']}</td>
                                <td>{$value['lunch_offer']}</td>
                                <td>{$value['renthouse_offer']}</td>
                                <td>{$value['traveling_offer']}</td>
                                <td>{$value['social_security_paying']}</td>
                                <td>{$value['withholding_tax_paying']}</td>
                                <td>{$value['income_net']}</td>
                                <td>{$value['company_paying']}</td>
                             </tr>";
                    }
                ?>
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td>Total salary : <?php echo $total_salary ?></td>
                    <td>Total lunch pay : <?php echo $total_lunchpay ?></td></td>
                    <td>Total rent house pay : <?php echo $total_renthousepay ?></td></td>
                    <td>Total travel pay : <?php echo $total_travelpay ?></td></td>
                    <td>Total social security pay : <?php echo $total_socialsecurity ?></td>
                    <td></td>
                    <td>Total income net : <?php echo $total_incomenet ?></td>
                    <td>Total company pay : <?php echo $total_companypay ?></td>
                </tr>
            </tbody>
        </table>
    </section><br>
    <section>
        <button class="export">Export</button>
    </section><br>
    <section>
        <a class="backclick1" href="admin_payroll_input.php">Back</a>
    </section>
    <section>
        <a class="backclick1" href="a_report.php">Go to other reports</a>
    </section>
    <?php require_once("footer.php"); ?>
    <script>
        var tiny = $('#tiny').tiny().data('api_tiny');

        $("button").click(function(){
            $("#table2excel").table2excel({
                // exclude CSS class
                exclude: ".noExl",
                name: "Worksheet Name",
                filename: "Payroll summary report", //do not include extension
                fileext: ".xls" // file extension
            }); 
        });
    </script>
</body>
</html>