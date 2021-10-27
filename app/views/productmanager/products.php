<?php include 'top-container.php'; ?>
<link rel="stylesheet" href="<?php echo URL ?>vendors/css/productmanager/products.css">
<!-- Top content -->
<div class="top-container">
    <p>Products</p>
</div>



<!--  ******* search bar ********* -->
<!-- <div class="searchbar">
    <form class="search-form" action="#">
        <label for="lname">Landowner's name:</label>
        <input type="text" id="lname" placeholder="Landowner's Name" name="lname">
        <button type="submit">Search</button>
    </form>
</div> -->

<!-- ************* product item cards  -->
<div class="outerContainer">
<div class="container">
    <div class="card">
        <div class="imgBx">
            <img src="<?php echo URL ?>vendors/images/productmanager/c.png" alt="nike-air-shoe">
        </div>

        <div class="contentBx">

            <h2>B-100 Black Tea</h2>
            <!-- <input type="text" value="345Kg" readonly> -->
            <label for="" id="B-100_Black_Tea"><?php echo $data[2]['amount']?> Kg</label>
            
        </div>
    </div>

    <div class="card">
        <div class="imgBx">
            <img src="<?php echo URL ?>vendors/images/productmanager/d.png" alt="nike-air-shoe">
        </div>

        <div class="contentBx">

            <h2>N Black Tea</h2>
            <label for="" id="B-100_Black_Tea"><?php echo $data[3]['amount']?> Kg</label>
        </div>
    </div>


    <div class="card">
        <div class="imgBx">
            <img src="<?php echo URL ?>vendors/images/productmanager/earlygrey.png" alt="nike-air-shoe">
        </div>

        <div class="contentBx">

            <h2>Early Grey</h2>
            <label for="" id="B-100_Black_Tea"><?php echo $data[4]['amount']?> Kg</label>
        </div>
    </div>


    <div class="card">
        <div class="imgBx">
            <img src="<?php echo URL ?>vendors/images/productmanager/greentea.png" alt="nike-air-shoe">
        </div>

        <div class="contentBx">

            <h2>Green Tea</h2>
            <label for="" id="B-100_Black_Tea"><?php echo $data[0]['amount']?> Kg</label>
        </div>
    </div>


    <div class="card">
        <div class="imgBx">
            <img src="<?php echo URL ?>vendors/images/productmanager/masalachai.png" alt="nike-air-shoe">
        </div>

        <div class="contentBx">

            <h2>Masala Chai</h2>
            <label for="" id="B-100_Black_Tea"><?php echo $data[5]['amount']?> Kg</label>
        </div>
    </div>  

</div>


<!-- Second row -->


<div class="container" style="padding-left: 140px;">
    <div class="card">
        <div class="imgBx">
            <img src="<?php echo URL ?>vendors/images/productmanager/matcha.png" alt="nike-air-shoe">
        </div>

        <div class="contentBx">

            <h2>Matcha Tea</h2>
            <label for="" id="B-100_Black_Tea"><?php echo $data[6]['amount']?> Kg</label>
        </div>
    </div>

    <div class="card">
        <div class="imgBx">
            <img src="<?php echo URL ?>vendors/images/productmanager/whitetea.png" alt="nike-air-shoe">
        </div>

        <div class="contentBx">

            <h2>White Tea</h2>
            <label for="" id="B-100_Black_Tea"><?php echo $data[1]['amount']?> Kg</label>
        </div>
    </div>


    <div class="card">
        <div class="imgBx">
            <img src="<?php echo URL ?>vendors/images/productmanager/oolang.png" alt="nike-air-shoe">
        </div>

        <div class="contentBx">

            <h2>Oolang Tea</h2>
            <label for="" id="B-100_Black_Tea"><?php echo $data[7]['amount']?> Kg</label>
        </div>
    </div>


    <div class="card">
        <div class="imgBx">
            <img src="<?php echo URL ?>vendors/images/productmanager/sencha.png" alt="nike-air-shoe">
        </div>

        <div class="contentBx">

            <h2>Sencha Tea</h2>
            <label for="" id="B-100_Black_Tea"><?php echo $data[8]['amount']?> Kg</label>
        </div>
    </div>


    <!-- <div class="card">
        <div class="imgBx">
            <img src="<?php echo URL ?>vendors/images/productmanager/c.png" alt="nike-air-shoe">
        </div>

        <div class="contentBx">

            <h2>Green Tea</h2>
            <a href="#">3536KG</a>
        </div>
    </div>   -->

</div>

</div>
<!-- **************   Table container   *********-->
<div class="table-container" id="pricetbl">
    <div class="table-section">
        <table class="teapricetable">
            <thead class="threadcls">
                <tr class="trcls">
                    <!-- <th class="thcls">Updated Date</th> -->
                    <th class="thcls">Pid</th>
                    <th class="thcls">Product Name</th>
                    <th class="thcls">Amount(Kg)</th>

                </tr>
            </thead>

            <!-- <tr>
                <td class="tdcls"><a class="acls" href="#">2021</a></td>
                <td class="tdcls">January</td>
                <td class="tdcls">98</td>
                <td class="tdcls">
                    <p class="status status-paid">Updated</p>
                </td>

            </tr> -->


            <tr>
                <!-- <td class="tdcls">12/10/2021</td> -->
                <td class="tdcls">P001</td>
                <td class="tdcls">B-345-Black-Tea</td>
                <td class="tdcls">234</td>

            </tr>
            <tr>
                <!-- <td class="tdcls">12/10/2021</td> -->
                <td class="tdcls">P001</td>
                <td class="tdcls">B-345-Black-Tea</td>
                <td class="tdcls">234</td>

            </tr>
            <tr>
                <!-- <td class="tdcls">12/10/2021</td> -->
                <td class="tdcls">P001</td>
                <td class="tdcls">B-345-Black-Tea</td>
                <td class="tdcls">234</td>

            </tr>
            <tr>
                <!-- <td class="tdcls">12/10/2021</td> -->
                <td class="tdcls">P001</td>
                <td class="tdcls">B-345-Black-Tea</td>
                <td class="tdcls">234</td>

            </tr>
            <tr>
                <!-- <td class="tdcls">12/10/2021</td> -->
                <td class="tdcls">P001</td>
                <td class="tdcls">B-345-Black-Tea</td>
                <td class="tdcls">234</td>
            </tr>
            <tr>
                <!-- <td class="tdcls">12/10/2021</td> -->
                <td class="tdcls">P001</td>
                <td class="tdcls">B-345-Black-Tea</td>
                <td class="tdcls">234</td>
            </tr>



        </table>
    </div>
</div>

<?php include 'bottom-container.php'; ?>