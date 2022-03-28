<?php include 'top-container.php'; ?>
<?php include 'js/landowner/Daily_Net_Weightjs.php"'; ?>
<link rel="stylesheet" href="<?php echo URL ?>vendors/css/landowner/Daily_Net_Weight.css">
<script type="text/javascript" src="<?php echo URL ?>vendors/js/sweetalert2.all.min.js"></script>

<?php
if (isset($_POST['Error'])) {
    echo '<script type="text/javascript">',
    'dateNotFound();',
    '</script>';
}
?>

<!-- <?php
        echo "<pre>";
        print_r($data);
        echo "</pre>";
        ?> -->
<!-- Title -->

<div class="top-container">
    <p>Daily Net Weight</p>
</div>


<!-- grid -->
<div class="wrapperdiv">
    <div class="container">

        <div class="search-container">
            <div class="searchbar">
                <form class="search-form" action="<?php echo URL ?>Landowner/Daily_Net_Weight" method="post">
                    <label for="lname">Date : </label>
                    <input type="date" id="searchDate" name="searchDate">
                    <button type="submit">Search</button>
                </form>
            </div>
        </div>

        <div class="table-container">

            <table class="teapricetable">
                <?php if ($data == false) { ?>
                    <tr>
                        <th class="thcls"></th>
                        <td class="tdcls" style="color: red; font-size:larger">You haven't supply tea yet </td>
                    </tr>
                <?php
                } else {
                ?>
                    <tr>
                        <th class="thcls">Date</th>
                        <td class="tdcls"><?php echo $data[0]['date']; ?></td>
                    </tr>

                    <tr>
                        <th class="thcls">Initial Weight from Agent</th>
                        <td class="tdcls"><?php echo $data[0]['initial_weight_agent']; ?> Kg</td>
                    </tr>

                    <tr>
                        <th class="thcls">Initial Weight from supervisor</th>
                        <td class="tdcls"><?php if ($data[0]['initial_weight_sup'] == NULL) {
                                                echo "Data not Availabale Yet";
                                            } else {
                                                echo $data[0]['initial_weight_sup'];
                                            } ?> Kg</td>
                    </tr>

                    <tr>
                        <th class="thcls">Container Percentage</th>
                        <td class="tdcls"><?php if ($data[0]['container_percentage'] == NULL) {
                                                echo "Data not Availabale Yet";
                                            } else {
                                                echo $data[0]['container_percentage'];
                                            } ?> </td>
                    </tr>

                    <tr>
                        <th class="thcls">Water Percentage</th>
                        <td class="tdcls"><?php if ($data[0]['water_percentage'] == NULL) {
                                                echo "Data not Availabale Yet";
                                            } else {
                                                echo $data[0]['water_percentage'];
                                            } ?> </td>
                    </tr>

                    <tr>
                        <th class="thcls">Mature Percentage</th>
                        <td class="tdcls"><?php if ($data[0]['matured_percentage'] == NULL) {
                                                echo "Data not Availabale Yet";
                                            } else {
                                                echo $data[0]['matured_percentage'];
                                            } ?> </td>
                    </tr>
                    <tr>
                        <th class="thcls">Net Weight</th>
                        <td class="tdcls"><?php if ($data[0]['net_weight'] == NULL) {
                                                echo "Data not Availabale Yet";
                                            } else {
                                                echo ($data[0]['net_weight']);
                                            } ?> kg</td>
                    </tr>
                <?php } ?>




            </table>

        </div>

    </div>
</div>




<?php include 'bottom-container.php'; ?>