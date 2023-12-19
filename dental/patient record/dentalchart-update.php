<?php
require "../../config/dental_function.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dental chart Update</title>
</head>
<?php include('../includes/style-links.php'); ?>
<body style="background-color: #D7F1F6;">
    <!--Dental Charting-->
    <div class="container-lg bg-light shadow-lg rounded p-2 mt-0">
        <div class="container-lg rounded">
            <div class="row p-3 pt-4 ">
                <div class="col-sm-6 fw-semibold fs-5">
                    <p>Name: </p>
                    <p>Age: </p>
                    <p>Sex: </p>
                </div>

                <div class="col-sm-6 fw-semibold fs-5">
                    <p>Birthdate: </p>
                    <p>Marital Status: </p>
                    <p>Contact No: </p>
                </div>
            </div>

            <hr class="border-2 mx-auto rounded" id="hrco">

            <div class="container-lg">
                <div class="row p-3 pt-0">
                    <div class="col-sm-12 col-md-3">
                        <p class="h5 fw-medium" style="color: #FF6D33;">Legend</p>
                        <div class="row">
                            <div class="col-sm-6 col-md-12">
                                <div class="d-flex align-items-center justify-content-center p-1">
                                    <div class="col-2 boxL p-1 me-2 fw-bolder">Am</div>
                                    <div class="col-10 p-1 fw-bold">Amalgam</div>
                                </div>

                                <div class=" d-flex align-items-center justify-content-center p-1">
                                    <div class="col-2 boxL p-1 me-2 fw-bolder">C</div>
                                    <div class="col-10 p-1 fw-bold">Caries</div>
                                </div>

                                <div class=" d-flex align-items-center justify-content-center p-1">
                                    <div class="col-2 boxL p-1 me-2 fw-bolder">Co</div>
                                    <div class="col-10 p-1 fw-bold">Composite Restoration</div>
                                </div>

                                <div class=" d-flex align-items-center justify-content-center p-1">
                                    <div class="col-2 boxL p-1 me-2 fw-bolder">X</div>
                                    <div class="col-10 p-1 fw-bold">Tooth Extraction</div>
                                </div>

                            </div>

                            <div class="col-sm-6 col-md-12">
                                <div class=" d-flex align-items-center justify-content-center p-1">
                                    <div class="col-2 boxL p-1 me-2 fw-bolder">M</div>
                                    <div class="col-10 p-1 fw-bold">Missing</div>
                                </div>

                                <div class=" d-flex align-items-center justify-content-center p-1">
                                    <div class="col-lg-2 boxL p-1 me-2 fw-bolder">PFM</div>
                                    <div class="col-10 p-1 fw-bold">Tooth with crown</div>
                                </div>

                                <div class=" d-flex align-items-center justify-content-center p-1">
                                    <div class="col-2 boxL p-1 me-2 fw-bolder">TF</div>
                                    <div class="col-10 p-1 fw-bold">Temporary filling</div>
                                </div>

                                <div class=" d-flex align-items-center justify-content-center p-1">
                                    <div class="col-lg-2 boxL p-1 me-2 fw-bolder">RCT</div>
                                    <div class="col-10 p-1 fw-bold">Root Canal treated tooth</div>
                                </div>
                            </div>
                        </div>

                    </div>


                    <!-- Dental Chart -->
                    <div class="col-sm-12 col-md-9">
                        <form action="dental_code.php" method="post">
                            <?php
                            $paramResult = checkParamId('id');
                            if (!is_numeric($paramResult)) {
                                echo '<h5>' . $paramResult . '</h5>';
                                return false;
                            }

                            $user = getById('dentalcharting_tbl', checkParamId('id'));
                            if ($user['status'] == 200) {
                            ?>
                                <input type="hidden" name="patient_id" value="<?= $user['data']['patient_id']; ?>">
                                <!--Top-->
                                <div class="row d-flex justify-content-center align-items-center">
                                    <!--Left-->
                                    <div class="row col-sm-6 col-md-10 col-lg-6">
                                        <div class="col-md-6 d-flex">
                                            <div class="d-flex flex-column justify-content-center align-items-center mx-1">
                                                <p class="pt-3 mb-1 fw-semibold">18</p>
                                                <img src="icons/tooth.png">
                                                <input type="text" class="w-100 mt-2 rounded" name="tooth_18" value="<?= $user['data']['tooth_18']; ?>">
                                            </div>

                                            <div class="d-flex flex-column justify-content-center align-items-center mx-1">
                                                <p class="pt-3 mb-1 fw-semibold">17</p>
                                                <img src="icons/tooth.png">
                                                <input type="text" class="w-100 mt-2 rounded" name="tooth_17" value="<?= $user['data']['tooth_17']; ?>">
                                            </div>

                                            <div class="d-flex flex-column justify-content-center align-items-center mx-1">
                                                <p class="pt-3 mb-1 fw-semibold">16</p>
                                                <img src="icons/tooth.png">
                                                <input type="text" class="w-100 mt-2 rounded" name="tooth_16" value="<?= $user['data']['tooth_16']; ?>">
                                            </div>

                                            <div class="d-flex flex-column justify-content-center align-items-center mx-1">
                                                <p class="pt-3 mb-1 fw-semibold">15</p>
                                                <img src="icons/tooth.png">
                                                <input type="text" class="w-100 mt-2 rounded" name="tooth_15" value="<?= $user['data']['tooth_15']; ?>">
                                            </div>
                                        </div>

                                        <div class="col-md-6 d-flex">
                                            <div class="d-flex flex-column justify-content-center align-items-center mx-1">
                                                <p class="pt-3 mb-1 fw-semibold">14</p>
                                                <img src="icons/tooth.png">
                                                <input type="text" class="w-100 mt-2 rounded" name="tooth_14" value="<?= $user['data']['tooth_14']; ?>">
                                            </div>

                                            <div class="d-flex flex-column justify-content-center align-items-center mx-1">
                                                <p class="pt-3 mb-1 fw-semibold">13</p>
                                                <img src="icons/tooth.png">
                                                <input type="text" class="w-100 mt-2 rounded" name="tooth_13" value="<?= $user['data']['tooth_13']; ?>">
                                            </div>

                                            <div class="d-flex flex-column justify-content-center align-items-center mx-1">
                                                <p class="pt-3 mb-1 fw-semibold">12</p>
                                                <img src="icons/tooth.png">
                                                <input type="text" class="w-100 mt-2 rounded" name="tooth_12" value="<?= $user['data']['tooth_12']; ?>">
                                            </div>

                                            <div class="d-flex flex-column justify-content-center align-items-center mx-1">
                                                <p class="pt-3 mb-1 fw-semibold">11</p>
                                                <img src="icons/tooth.png">
                                                <input type="text" class="w-100 mt-2 rounded" name="tooth_11" value="<?= $user['data']['tooth_11']; ?>">
                                            </div>
                                        </div>
                                    </div>

                                    <!--Right-->
                                    <div class="row col-sm-6 col-md-10 col-lg-6">
                                        <div class="col-md-6 d-flex">
                                            <div class="d-flex flex-column justify-content-center align-items-center mx-1">
                                                <p class="pt-3 mb-1 fw-semibold">21</p>
                                                <img src="icons/tooth.png">
                                                <input type="text" class="w-100 mt-2 rounded" name="tooth_21" value="<?= $user['data']['tooth_21']; ?>">
                                            </div>

                                            <div class="d-flex flex-column justify-content-center align-items-center mx-1">
                                                <p class="pt-3 mb-1 fw-semibold">22</p>
                                                <img src="icons/tooth.png">
                                                <input type="text" class="w-100 mt-2 rounded" name="tooth_22" value="<?= $user['data']['tooth_22']; ?>">
                                            </div>

                                            <div class="d-flex flex-column justify-content-center align-items-center mx-1">
                                                <p class="pt-3 mb-1 fw-semibold">23</p>
                                                <img src="icons/tooth.png">
                                                <input type="text" class="w-100 mt-2 rounded" name="tooth_23" value="<?= $user['data']['tooth_23']; ?>">
                                            </div>

                                            <div class="d-flex flex-column justify-content-center align-items-center mx-1">
                                                <p class="pt-3 mb-1 fw-semibold">24</p>
                                                <img src="icons/tooth.png">
                                                <input type="text" class="w-100 mt-2 rounded" name="tooth_24" value="<?= $user['data']['tooth_24']; ?>">
                                            </div>
                                        </div>

                                        <div class="col-md-6 d-flex">
                                            <div class="d-flex flex-column justify-content-center align-items-center mx-1">
                                                <p class="pt-3 mb-1 fw-semibold">25</p>
                                                <img src="icons/tooth.png">
                                                <input type="text" class="w-100 mt-2 rounded" name="tooth_25" value="<?= $user['data']['tooth_25']; ?>">
                                            </div>

                                            <div class="d-flex flex-column justify-content-center align-items-center mx-1">
                                                <p class="pt-3 mb-1 fw-semibold">26</p>
                                                <img src="icons/tooth.png">
                                                <input type="text" class="w-100 mt-2 rounded" name="tooth_26" value="<?= $user['data']['tooth_26']; ?>">
                                            </div>

                                            <div class="d-flex flex-column justify-content-center align-items-center mx-1">
                                                <p class="pt-3 mb-1 fw-semibold">27</p>
                                                <img src="icons/tooth.png">
                                                <input type="text" class="w-100 mt-2 rounded" name="tooth_27" value="<?= $user['data']['tooth_27']; ?>">
                                            </div>

                                            <div class="d-flex flex-column justify-content-center align-items-center mx-1">
                                                <p class="pt-3 mb-1 fw-semibold">28</p>
                                                <img src="icons/tooth.png">
                                                <input type="text" class="w-100 mt-2 rounded" name="tooth_28" value="<?= $user['data']['tooth_28']; ?>">
                                            </div>
                                        </div>
                                    </div>


                                    <!--Adult-->
                                    <!--Bottom-->
                                    <div class="row d-flex justify-content-center align-items-center px-0">
                                        <!--Left-->
                                        <div class="row col-sm-6 col-md-10 col-lg-6 ps-0 mt-4">
                                            <div class="col-md-6 d-flex">
                                                <div class="d-flex flex-column justify-content-center align-items-center mx-1">
                                                    <img src="icons/tooth.png">
                                                    <p class="pt-2 mb-0 fw-semibold">48</p>
                                                    <input type="text" class="w-100 mt-2 rounded" name="tooth_48" value="<?= $user['data']['tooth_48']; ?>">
                                                </div>

                                                <div class="d-flex flex-column justify-content-center align-items-center mx-1">
                                                    <img src="icons/tooth.png">
                                                    <p class="pt-2 mb-0 fw-semibold">47</p>
                                                    <input type="text" class="w-100 mt-2 rounded" name="tooth_47" value="<?= $user['data']['tooth_47']; ?>">
                                                </div>

                                                <div class="d-flex flex-column justify-content-center align-items-center mx-1">
                                                    <img src="icons/tooth.png">
                                                    <p class="pt-2 mb-0 fw-semibold">46</p>
                                                    <input type="text" class="w-100 mt-2 rounded" name="tooth_46" value="<?= $user['data']['tooth_46']; ?>">
                                                </div>

                                                <div class="d-flex flex-column justify-content-center align-items-center mx-1">
                                                    <img src="icons/tooth.png">
                                                    <p class="pt-2 mb-0 fw-semibold">45</p>
                                                    <input type="text" class="w-100 mt-2 rounded" name="tooth_45" value="<?= $user['data']['tooth_45']; ?>">
                                                </div>
                                            </div>

                                            <div class="col-md-6 d-flex">
                                                <div class="d-flex flex-column justify-content-center align-items-center mx-1">
                                                    <img src="icons/tooth.png">
                                                    <p class="pt-2 mb-0 fw-semibold">44</p>
                                                    <input type="text" class="w-100 mt-2 rounded" name="tooth_44" value="<?= $user['data']['tooth_44']; ?>">
                                                </div>

                                                <div class="d-flex flex-column justify-content-center align-items-center mx-1">
                                                    <img src="icons/tooth.png">
                                                    <p class="pt-2 mb-0 fw-semibold">43</p>
                                                    <input type="text" class="w-100 mt-2 rounded" name="tooth_43" value="<?= $user['data']['tooth_43']; ?>">
                                                </div>

                                                <div class="d-flex flex-column justify-content-center align-items-center mx-1">
                                                    <img src="icons/tooth.png">
                                                    <p class="pt-2 mb-0 fw-semibold">42</p>
                                                    <input type="text" class="w-100 mt-2 rounded" name="tooth_42" value="<?= $user['data']['tooth_42']; ?>">
                                                </div>

                                                <div class="d-flex flex-column justify-content-center align-items-center mx-1">
                                                    <img src="icons/tooth.png">
                                                    <p class="pt-2 mb-0 fw-semibold">41</p>
                                                    <input type="text" class="w-100 mt-2 rounded" name="tooth_41" value="<?= $user['data']['tooth_41']; ?>">
                                                </div>
                                            </div>
                                        </div>

                                        <!--Right-->
                                        <div class="row col-sm-6 col-md-10 col-lg-6 mt-4">
                                            <div class="col-md-6 d-flex">
                                                <div class="d-flex flex-column justify-content-center align-items-center mx-1">

                                                    <img src="icons/tooth.png">
                                                    <p class="pt-2 mb-0 fw-semibold">31</p>
                                                    <input type="text" class="w-100 mt-2 rounded" name="tooth_31" value="<?= $user['data']['tooth_31']; ?>">

                                                </div>

                                                <div class="d-flex flex-column justify-content-center align-items-center mx-1">

                                                    <img src="icons/tooth.png">
                                                    <p class="pt-2 mb-0 fw-semibold">32</p>
                                                    <input type="text" class="w-100 mt-2 rounded" name="tooth_32" value="<?= $user['data']['tooth_32']; ?>">

                                                </div>

                                                <div class=" d-flex flex-column justify-content-center align-items-center mx-1">

                                                    <img src="icons/tooth.png">
                                                    <p class="pt-2 mb-0 fw-semibold">33</p>
                                                    <input type="text" class="w-100 mt-2 rounded" name="tooth_33" value="<?= $user['data']['tooth_33']; ?>">

                                                </div>

                                                <div class="d-flex flex-column justify-content-center align-items-center mx-1">

                                                    <img src="icons/tooth.png">
                                                    <p class="pt-2 mb-0 fw-semibold">34</p>
                                                    <input type="text" class="w-100 mt-2 rounded" name="tooth_34" value="<?= $user['data']['tooth_34']; ?>">

                                                </div>
                                            </div>

                                            <div class="col-md-6 d-flex">
                                                <div class="d-flex flex-column justify-content-center align-items-center mx-1">

                                                    <img src="icons/tooth.png">
                                                    <p class="pt-2 mb-0 fw-semibold">35</p>
                                                    <input type="text" class="w-100 mt-2 rounded" name="tooth_35" value="<?= $user['data']['tooth_35']; ?>">

                                                </div>

                                                <div class="d-flex flex-column justify-content-center align-items-center mx-1">

                                                    <img src="icons/tooth.png">
                                                    <p class="pt-2 mb-0 fw-semibold">36</p>
                                                    <input type="text" class="w-100 mt-2 rounded" name="tooth_36" value="<?= $user['data']['tooth_36']; ?>">

                                                </div>

                                                <div class="d-flex flex-column justify-content-center align-items-center mx-1">

                                                    <img src="icons/tooth.png">
                                                    <p class="pt-2 mb-0 fw-semibold">37</p>
                                                    <input type="text" class="w-100 mt-2 rounded" name="tooth_37" value="<?= $user['data']['tooth_37']; ?>">

                                                </div>

                                                <div class="d-flex flex-column justify-content-center align-items-center mx-1">
                                                    <img src="icons/tooth.png">
                                                    <p class="pt-2 mb-0 fw-semibold">38</p>
                                                    <input type="text" class="w-100 mt-2 rounded" name="tooth_38" value="<?= $user['data']['tooth_38']; ?>">

                                                </div>
                                            </div>
                                        </div>
                                        <!--For kids-->
                                        <!--Top-->
                                        <div class="row d-flex justify-content-center align-items-center">
                                            <!--Left-->
                                            <div class="row col-sm-6 col-md-10 col-lg-6">
                                                <div class="col-12 d-flex">
                                                    <div class="d-flex flex-column justify-content-center align-items-center mx-1">
                                                        <p class="pt-3 mb-1 fw-semibold">55</p>
                                                        <img src="icons/kidtooth.png">
                                                        <input type="text" class="w-100 mt-2 rounded" name="tooth_55" value="<?= $user['data']['tooth_55']; ?>">
                                                    </div>
                                                    <div class="d-flex flex-column justify-content-center align-items-center mx-1">
                                                        <p class="pt-3 mb-1 fw-semibold">54</p>
                                                        <img src="icons/kidtooth.png">
                                                        <input type="text" class="w-100 mt-2 rounded" name="tooth_54" value="<?= $user['data']['tooth_54']; ?>">
                                                    </div>

                                                    <div class="d-flex flex-column justify-content-center align-items-center mx-1">
                                                        <p class="pt-3 mb-1 fw-semibold">53</p>
                                                        <img src="icons/kidtooth.png">
                                                        <input type="text" class="w-100 mt-2 rounded" name="tooth_53" value="<?= $user['data']['tooth_53']; ?>">
                                                    </div>

                                                    <div class="d-flex flex-column justify-content-center align-items-center mx-1">
                                                        <p class="pt-3 mb-1 fw-semibold">52</p>
                                                        <img src="icons/kidtooth.png">
                                                        <input type="text" class="w-100 mt-2 rounded" name="tooth_52" value="<?= $user['data']['tooth_52']; ?>">
                                                    </div>

                                                    <div class="d-flex flex-column justify-content-center align-items-center mx-1">
                                                        <p class="pt-3 mb-1 fw-semibold">51</p>
                                                        <img src="icons/kidtooth.png">
                                                        <input type="text" class="w-100 mt-2 rounded" name="tooth_51" value="<?= $user['data']['tooth_51']; ?>">
                                                    </div>
                                                </div>
                                            </div>

                                            <!--Right-->
                                            <div class="row col-sm-6 col-md-10 col-lg-6">
                                                <div class="col-12 d-flex">
                                                    <div class="d-flex flex-column justify-content-center align-items-center mx-1">
                                                        <p class="pt-3 mb-1 fw-semibold">61</p>
                                                        <img src="icons/kidtooth.png">
                                                        <input type="text" class="w-100 mt-2 rounded" name="tooth_61" value="<?= $user['data']['tooth_61']; ?>">
                                                    </div>

                                                    <div class="d-flex flex-column justify-content-center align-items-center mx-1">
                                                        <p class="pt-3 mb-1 fw-semibold">62</p>
                                                        <img src="icons/kidtooth.png">
                                                        <input type="text" class="w-100 mt-2 rounded" name="tooth_62" value="<?= $user['data']['tooth_62']; ?>">
                                                    </div>

                                                    <div class="d-flex flex-column justify-content-center align-items-center mx-1">
                                                        <p class="pt-3 mb-1 fw-semibold">63</p>
                                                        <img src="icons/kidtooth.png">
                                                        <input type="text" class="w-100 mt-2 rounded" name="tooth_63" value="<?= $user['data']['tooth_63']; ?>">
                                                    </div>

                                                    <div class="d-flex flex-column justify-content-center align-items-center mx-1">
                                                        <p class="pt-3 mb-1 fw-semibold">64</p>
                                                        <img src="icons/kidtooth.png">
                                                        <input type="text" class="w-100 mt-2 rounded" name="tooth_64" value="<?= $user['data']['tooth_64']; ?>">
                                                    </div>
                                                    <div class="d-flex flex-column justify-content-center align-items-center mx-1">
                                                        <p class="pt-3 mb-1 fw-semibold">65</p>
                                                        <img src="icons/kidtooth.png">
                                                        <input type="text" class="w-100 mt-2 rounded" name="tooth_65" value="<?= $user['data']['tooth_65']; ?>">
                                                    </div>
                                                </div>
                                            </div>

                                            <!--Bottom-->
                                            <div class="row d-flex justify-content-center align-items-center px-0">
                                                <!--Left-->
                                                <div class="row col-sm-6 col-md-10 col-lg-6 mt-1">
                                                    <div class="col-12 d-flex">
                                                        <div class="d-flex flex-column justify-content-center align-items-center mx-1">
                                                            <img src="icons/kidtooth.png">
                                                            <p class="pt-2 mb-0 fw-semibold">85</p>
                                                            <input type="text" class="w-100 mt-2 rounded" name="tooth_85" value="<?= $user['data']['tooth_85']; ?>">
                                                        </div>
                                                        <div class="d-flex flex-column justify-content-center align-items-center mx-1">
                                                            <img src="icons/kidtooth.png">
                                                            <p class="pt-2 mb-0 fw-semibold">84</p>
                                                            <input type="text" class="w-100 mt-2 rounded" name="tooth_84" value="<?= $user['data']['tooth_84']; ?>">
                                                        </div>

                                                        <div class="d-flex flex-column justify-content-center align-items-center mx-1">
                                                            <img src="icons/kidtooth.png">
                                                            <p class="pt-2 mb-0 fw-semibold">83</p>
                                                            <input type="text" class="w-100 mt-2 rounded" name="tooth_83" value="<?= $user['data']['tooth_83']; ?>">
                                                        </div>

                                                        <div class="d-flex flex-column justify-content-center align-items-center mx-1">
                                                            <img src="icons/kidtooth.png">
                                                            <p class="pt-2 mb-0 fw-semibold">82</p>
                                                            <input type="text" class="w-100 mt-2 rounded" name="tooth_82" value="<?= $user['data']['tooth_82']; ?>">
                                                        </div>

                                                        <div class="d-flex flex-column justify-content-center align-items-center mx-1">
                                                            <img src="icons/kidtooth.png">
                                                            <p class="pt-2 mb-0 fw-semibold">81</p>
                                                            <input type="text" class="w-100 mt-2 rounded" name="tooth_81" value="<?= $user['data']['tooth_81']; ?>">
                                                        </div>
                                                    </div>
                                                </div>

                                                <!--Right-->
                                                <div class="row col-sm-6 col-md-10 col-lg-6 mt-1">
                                                    <div class="col-12 d-flex">
                                                        <div class="d-flex flex-column justify-content-center align-items-center mx-1">
                                                            <img src="icons/kidtooth.png">
                                                            <p class="pt-2 mb-0 fw-semibold">71</p>
                                                            <input type="text" class="w-100 mt-2 rounded" name="tooth_71" value="<?= $user['data']['tooth_71']; ?>">
                                                        </div>
                                                        <div class="d-flex flex-column justify-content-center align-items-center mx-1">
                                                            <img src="icons/kidtooth.png">
                                                            <p class="pt-2 mb-0 fw-semibold">72</p>
                                                            <input type="text" class="w-100 mt-2 rounded" name="tooth_72" value="<?= $user['data']['tooth_72']; ?>">
                                                        </div>

                                                        <div class="d-flex flex-column justify-content-center align-items-center mx-1">
                                                            <img src="icons/kidtooth.png">
                                                            <p class="pt-2 mb-0 fw-semibold">73</p>
                                                            <input type="text" class="w-100 mt-2 rounded" name="tooth_73" value="<?= $user['data']['tooth_73']; ?>">
                                                        </div>

                                                        <div class="d-flex flex-column justify-content-center align-items-center mx-1">
                                                            <img src="icons/kidtooth.png">
                                                            <p class="pt-2 mb-0 fw-semibold">74</p>
                                                            <input type="text" class="w-100 mt-2 rounded" name="tooth_74" value="<?= $user['data']['tooth_74']; ?>">
                                                        </div>

                                                        <div class="d-flex flex-column justify-content-center align-items-center mx-1">
                                                            <img src="icons/kidtooth.png">
                                                            <p class="pt-2 mb-0 fw-semibold">75</p>
                                                            <input type="text" class="w-100 mt-2 rounded" name="tooth_75" value="<?= $user['data']['tooth_75']; ?>">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                    </div>
                    <hr class="border-2 mx-auto mt-2 rounded" id="hrco">
                    <p class="h4 fw-medium" style="color: #FF6D33;">Dental Information</p>

                    <div class="row g-3 align-items-center">
                        <div class="col-3">
                            <label for="" class="col-form-label fw-semibold fs-5 ps-5">Periodontal Condition:</label>
                        </div>
                        <div class="col-9">
                            <input type="text" class="form-control" name="periodontal_condition" value="<?= $user['data']['periodontal_condition']; ?>">
                        </div>
                    </div>

                    <div class="row g-3 align-items-center">
                        <div class="col-3">
                            <label for="" class="col-form-label fw-semibold fs-5 ps-5">Oral Hygiene:</label>
                        </div>
                        <div class="col-9">
                            <input type="text" class="form-control" name="oral_hygiene" value="<?= $user['data']['oral_hygiene']; ?>">
                        </div>
                    </div>

                    <div class="row">
                        <div class="row col-6 my-3">
                            <div class="col-5">
                                <label for="" class="col-form-label fw-semibold fs-5 ps-5">Denture Upper:</label>
                            </div>
                            <div class="col-7">
                                <input type="text" class="form-control" name="denture_upper" value="<?= $user['data']['denture_upper']; ?>">
                            </div>
                        </div>

                        <div class="row col-6 my-3">
                            <div class="col-3">
                                <label for="" class="col-form-label fw-semibold fs-5 ps-5">Since:</label>
                            </div>
                            <div class="col-9">
                                <input type="date" class="form-control" name="since_upper" value="<?= $user['data']['since_upper']; ?>">
                            </div>
                        </div>

                        <div class="row col-6 my-3">
                            <div class="col-5">
                                <label for="" class="col-form-label fw-semibold fs-5 ps-5">Denture Lower:</label>
                            </div>
                            <div class="col-7">
                                <input type="text" class="form-control" name="denture_lower" value="<?= $user['data']['denture_lower']; ?>">
                            </div>
                        </div>

                        <div class="row col-6 my-3">
                            <div class="col-3">
                                <label for="" class="col-form-label fw-semibold fs-5 ps-5">Since:</label>
                            </div>
                            <div class="col-9">
                                <input type="date" class="form-control" name="since_lower" value="<?= $user['data']['since_lower']; ?>">
                            </div>
                        </div>
                    </div>

                    <div class="row g-3 align-items-center">
                        <div class="col-3">
                            <label for="" class="col-form-label fw-semibold fs-5 ps-5">Occlusion:</label>
                        </div>
                        <div class="col-9">
                            <input type="text" class="form-control" name="occlusion" value="<?= $user['data']['occlusion']; ?>">
                        </div>
                    </div>

                    <div class="row g-3 align-items-center">
                        <div class="col-3">
                            <label for="" class="col-form-label fw-semibold fs-5 ps-5">Abnormalities:</label>
                        </div>
                        <div class="col-9">
                            <input type="text" class="form-control" name="abnormalities" value="<?= $user['data']['abnormalities']; ?>">
                        </div>
                    </div>

                    <div class="row g-3 align-items-center">
                        <div class="col-3">
                            <label for="" class="col-form-label fw-semibold fs-5 ps-5">Nature of Treatment:</label>
                        </div>
                        <div class="col-9">
                            <input type="text" class="form-control" name="nature_of_treatment" value="<?= $user['data']['nature_of_treatment']; ?>">
                        </div>
                    </div>

                    <div class="row g-3 align-items-center">
                        <div class="col-3">
                            <label for="date" class="col-form-label fw-semibold fs-5 ps-5">Date:</label>
                        </div>
                        <div class="col-9">
                            <input type="date" class="form-control" name="date" value="<?= $user['data']['date']; ?>">
                        </div>
                    </div>

                    <div class="d-flex justify-content-end align-items-center mt-5">
                        <a class="btn mb-3 rounded fw-bold btn-primary me-3" href="../patient record/patient_record.php">Cancel</a>
                        <input type="submit" name="update" class="btn mb-3 rounded fw-bold" id="sub" value="Update">
                    </div>

                <?php } else {
                                echo '<h5>' . $user['message'] . '<h5>';
                            } ?>
                </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>