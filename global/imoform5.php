<?php
require_once '../../connection.php';
$personnelID = base64_decode($_SESSION['nbscisuserid']);

$studid  = $_GET['studid'];

$selPersonel = $conn->prepare('SELECT a.firstName, a.lastName from tblpersonnel2 a where personelId = ?');
$selPersonel->execute([$personnelID]);
$pdetails = $selPersonel->fetch();

$selStud = $connSMS->prepare('SELECT b.FirstName, b.MiddleName, b.LastName, b.CellNum, b.curr_barangay, b.curr_municipality, b.curr_province, d.dept_name from tbl_enrollees a
    JOIN tbl_student b ON b.Stud_ID = a.stud_id
    join tbl_course c on c.course_id = a.course_id
    JOIN tbl_department d ON d.dept_id = c.dept_id
    WHERE a.stud_id =? and a.enrollee_id = (SELECT max(x.enrollee_id) from tbl_enrollees x where x.stud_id = a.stud_id)');
$selStud->execute([$studid]);
$studdetails = $selStud->fetch();

function capitalizeThenLower($str) {
    // Separate the string into words
    $words = explode(' ', $str);

    // Capitalize each word and convert the rest of the letters to lowercase
    $capitalizedWords = array_map(function ($word) {
        $firstLetter = strtoupper(substr($word, 0, 1));
        $restOfWord = strtolower(substr($word, 1));
        return $firstLetter . $restOfWord;
    }, $words);

    // Reassemble the words back into a string
    $result = implode(' ', $capitalizedWords);

    return $result;
}

?>
<link href="../../css/styles.css" rel="stylesheet" />

<body style="font-size: .9rem !important;">
    <div>
        <div>
            <main>
                <div id="maincontent" class="container-fluid px-2">
                    <div>
                        <div>
                            <style>
                                #divmaincontaner .table,#divmaincontaner  {
                                    font-size: 12px !important;
                                }
                            </style>
                            <div>
                                <center>
                                    <table style="text-align: center; border-spacing: 0px; color:black;border-style: unset; line-height: 1; width: 100%; margin-bottom:0px;">
                                        <col width="10%">
                                        <col width="80%">
                                        <col width="10%">
                                        <tbody>
                                            <tr style="border-style: unset;">
                                                <td rowspan="10" style="border-style: unset; "><img src="../../assets/img/nbsclogo.png" height="70" style="padding: 0px 0px 0px 30px;    object-position: right;"></td>
                                                <td style="border-style: unset; margin-left: -20px"><b>Republic of the Philippines</b></td>
                                                <td rowspan="10" style="border-style: unset;">&nbsp;&nbsp;&nbsp;&nbsp;</td>
                                            </tr>


                                            <tr style="border-style: unset;">
                                                <td style="border-style: unset;" class="p-0">
                                                    <h4 style="margin: 0px">NORTHERN BUKIDNON STATE COLLEGE</h4>
                                                </td>
                                                <td style="border-style: unset;">&nbsp;</td>
                                            </tr>
                                            <tr style="border-style: unset;">
                                                <td style="border-style: unset;" class="p-0"><span><small>(Formerly Northern Bukidnon Comminity College) RA 11284</small></span></td>
                                                <td style="border-style: unset;" class="p-0">&nbsp;</td>
                                            </tr>
                                            <tr style="border-style: unset;">
                                                <td style="border-style: unset;" class="p-0"><span><small>Manolo Fortich Bukidnon *09753032951/09051610623 *Email Add: imo@nbsc.edu.ph</small></span></td>
                                                <td style="border-style: unset;" class="p-0">&nbsp;</td>
                                            </tr>
                                            <tr style="border-style: unset;">
                                                <td style="border-style: unset;" class="p-0">
                                                    <span><small>Creando Futura, Transformationis Vitae, Ductae a Deo</small></span>
                                                </td>
                                                <td>&nbsp;</td>
                                            </tr>

                                        </tbody>
                                    </table>
                                </center>
                            </div>
                            <hr class="text-dark mb-1 mt-0" style="opacity: 1; height: 2px">
                            <div id="divmaincontaner">
                                <div style="text-align: center;" >
                                        <table class="table table-sm table-borderless mb-0">
                                            <col width="33.3%">
                                            <col width="33.3%">
                                            <col width="33.3%">
                                            <tr>
                                                <td class="pb-0"></td>
                                                <td class="pb-0 text-center">IMO Form No.5</td>
                                                <td class="pb-0 text-end">Control No. &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                                            </tr>
                                        </table>
                                    <h5 class="mb-0">REQUEST FOR STUDENTS' SYSTEM ACCOUNTS</h5>
                                </div>
                                <div>
                                    <div class="table-responsive">
                                        <table class="table table-sm table-borderless mb-1">
                                            <tr>
                                                <td colspan="8">Receiving IMO Personnel: <span class="frminput"><?php echo $pdetails['firstName'].' '.$pdetails['lastName']?></span></td>
                                                <td colspan="4">Date: <span class="frminput"><?php echo date('F d, Y')?></span></td>
                                            </tr>
                                            <tr>
                                                <td colspan="12" class="pb-0">
                                                    <h6 class="mb-0" style="color: #052c65 !important;">STEP 1. BASIC PERSONAL INFORMATION</h6>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="8" class="py-0">1. Complete Name (Family Name, First Name, Middle Name)</td>
                                                <td colspan="4" class="py-0">Student ID: <?php echo $studid?></td>
                                            </tr>
                                            <!-- b.FirstName, b.MiddleName, b.LastName, b.CellNum, b.curr_barangay, b.curr_municipality, b.curr_province, d.dept_name  -->
                                            <tr>
                                                <td colspan="12" class="py-0">&nbsp;<?php echo capitalizeThenLower($studdetails['LastName'].', '.$studdetails['FirstName'].', '.$studdetails['MiddleName'])?></td>
                                            </tr>
                                            <tr>
                                                <td colspan="12"><span class="fst-italic">2. Address: </span> <?php echo capitalizeThenLower($studdetails['curr_barangay'].', '.$studdetails['curr_municipality'].', '.$studdetails['curr_province'])?></td>
                                            </tr>
                                            <tr>
                                                <td colspan="12"><span class="fst-italic">3. Contact Information:</span> Mobile Number: <?php echo $studdetails['CellNum']?></td>
                                            </tr>
                                            <tr>
                                                <td colspan="12"><span class="fst-italic">4. Department: </span><?php echo $studdetails['CellNum']?></td>
                                            </tr>
                                            <tr class="text-center">
                                                <td colspan="12">This is to inform RECEIPT of the services received indicated herein requested for fix/accomplished.</td>
                                            </tr>
                                            <tr class="text-center">
                                                <td colspan="4" class="pt-2"><?php echo strtoupper($studdetails['FirstName'].' '.($studdetails['MiddleName'] != ''? $studdetails['MiddleName'][0].'.': '').' '.$studdetails['LastName'])?><br>Name and Signature</td>
                                                <td colspan="4" class="pt-2"><?php echo date('F d, Y')?><br>Date Received</td>
                                                <td colspan="4" class="pt-2">DONE<br>Remarks</td>
                                            </tr>
                                            <tr class="text-center">
                                                <td colspan="12" class="p-0">
                                                   <hr class="text-dark my-0" style="opacity: 1;">
                                                </td>
                                            </tr>
                                            <tr class="text-center">
                                                <td colspan="4" class="py-0 text-start">Document Code: IMO-Form-05</td>
                                                <td colspan="4" class="py-0">Revision No. 2</td>
                                                <td colspan="4" class="py-0 text-end">Revision Date: June 22, 2023
                                                <td>
                                            </tr>
                                            <tr class="text-center">
                                                <td colspan="12" class="p-0">
                                                    -----------------------------------------------------------------------------------------------------------------------------------------------------
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="12" class="pt-0 pb-0">
                                                    <h6 class="mb-0"  style="color: #052c65 !important;">STEP 2. ACCOUNTS GENERATED:</h6>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="12" class="pt-0"><span class="border border-dark" style="font-size: xx-small;">&nbsp;✓&nbsp;</span> <b>Institutional Email</b> (for gmail, google meet, google drive, and other google services)</td>
                                            </tr>
                                        </table>
                                    </div>
                                    <table class="table table-sm table-bordered border-dark m-0">
                                        <col width="20%">
                                        <col width="80%">
                                        <tr>
                                            <td>Email Address: <?php echo $studid ?></td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td>Password:</td>
                                            <td></td>
                                        </tr>
    
                                    </table>
                                    <p class="text-end mb-0">Thank you very much. Please Come Again. &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p>
                                    <hr class="text-dark mt-2" style="opacity: 1; height: 2px">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>
</body>

<?php 



?>