<?php header('Access-Control-Allow-Origin: *'); ?>
<?php
    $this->load->view('web/includes/head.php');
?>
<body>
  <div id="mainpublicContent">
    <?php
    $this->load->view('web/includes/navbar.php');
?>
    <div class="about-us-wrapper pt-60 pb-40">
      <div class="container">
          <div class="row">
              <div class="col-sm-12 col-md-12 col-lg-12 col-xs-12 order-last order-lg-first">
                  <div class="about-text-wrap">
                      <h5>Project Members:</h5>
                      <br>

                     <table id="example1" class="table table-bordered table-striped">
                            <thead style="text-align: center">
                            <tr>
                                <th>JNEC</th>
                                <th>UIBK</th>
                            </tr>
                            </thead>
                            <tbody style="text-align: center">
                                <tr>
                                    <td>1. Dr Tshewang Lhendup – Project Adviser</td>
                                    <td>1.  Prof. Wolfgang Streicher – Partner Coordinator</td>
                                </tr>
                                <tr>
                                    <td>2.  Mr Samten Lhendup – Project Manager/Coordinator</td>
                                    <td>2.  Prof. Suzanne Kapelari – Member</td>
                                </tr>
                                <tr>
                                    <td>3.  Mr Rigden Yoezer Tenzin – Project Member/Secretary</td>
                                    <td> 3.  Prof. Anton Kraler – Member</td>
                                </tr>
                                <tr>
                                    <td>4.  Ms Wangmo – Member</td>
                                    <td>4.  Prof. Roland Maderebner – Member</td>
                                </tr>
                                <tr>
                                    <td>5.  Mr Lobzang Dorji – Member</td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>6.  Ms Thinley Wangmo – Member</td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>7.  Mr Phurba Tamang – Member</td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>8.  Ms Yeshey Dema – Project Accountant</td>
                                    <td></td>
                                </tr>
                            </tbody>
                        </table>
                  </div>
              </div>
          </div>
      </div>
    </div>
    <?php
    $this->load->view('web/includes/footer.php');
?>
  </div>
</body>






