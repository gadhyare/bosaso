<?php

/**
 * fileName: طباعة معلومات الطالب  
 */
?>

<?php $op = new Khas(); ?>
<br>
<br>
<br>
<br>
<?php
$data  =  $viewmodel; ?>

<?php  

$src = $op->siteSetting("siteUrl") . "uplouds/". $op->getStuInfoById($_GET['id'], 'stu_pic');
$con  = '<div style="text-align:left;width:100%;     ">                                         
<img src="' .  $src  . '"   alt="" style="width:60px; height:60px;  ">     </div>';
$con .='<table border="1" style="font-size:16px;">
        <tr>
                <td colspan="5" class="text-center"> المعلومات الشخصية </td>
            </tr>
        </table>';
$con .= '<br><table border="1" style="font-size:16px;">';
foreach ((array) $data as   $item) :
    $gender = ($item["gender"]  == 1) ? "ذكر" : "أنثى";
    $con .= '
           
            <tr>

                 
                <td colspan="2"> الاسم : ' . $item["StuName"] . ' </td>
               
                <td  colspan="2"> الرقم الجامعي : ' . $item["stu_num"] . ' </td>
                <td    style="text-center"> </td>
                 </tr>

            <tr> 
                <td colspan="2"> تاريخ التسجيل: ' . $item["reg_date"] . ' </td>

           
                <td colspan="2"> اسم الأم : ' . $item["mothername"] . ' </td>
                <td> تاريخ الميلاد : ' . $item["DOB"] . ' </td>
                  </tr>
            <tr>
                <td> مكان الميلاد : ' . $item["POB"] . ' </td>
               
                <td> الجنس : ' .  $gender . ' </td>
           
                <td> الجنسية : ' . $item["Natinality"] . ' </td>
                 <td  colspan="2"> الهواتف : ' . $item["Phones"] . ' </td>
                 </tr>
            <tr> 
                <td  colspan="3"> العنوان: ' . $item["StuAddress"] . ' </td>
                <td> المدينة : ' . $item["city"] . ' </td>
                <td> الدولة : ' . $item["contry"] . ' </td>
               
            </tr>';
endforeach;
$con .= '</table>
 
    <br>
    <br>

    <table border="1" style="font-size:16px" >

        <tr>
            <td colspan="8" class="text-center"> معلومات قريب الطالب</td>
        </tr>
        <tr>
            <td class="p-1 " style="color: #000;"> المسلسل</td>
            <td class="p-1 " style="color: #000;"> اسم القريب </td>
            <td class="p-1 " style="color: #000;"> صلة القرابة </td>
            <td class="p-1 " style="color: #000;"> درجة القرابة</td>
            <td class="p-1 " style="color: #000;"> العنوان </td>
            <td class="p-1 " style="color: #000;"> الإيميل </td>
            <td class="p-1 " style="color: #000;"> العنوان </td>
            <td class="p-1 " style="color: #000;">الهواتف</td>
        </tr> ';
$i = 1;
$rt = $op->getStuRelInfo();
foreach ((array) $rt as $relInfo) :
    $con .= '<tr>
                    <td style="border:1px solid #333;">' . $i . '</td>
                    <td  style="font-size:90%;">' . $relInfo["rel_name"] . '</td>
                    <td style="border:1px solid #333;">
                        ' .  $op->get_Rel_type($relInfo["rel_type"]) . '</td>
                    <td style="border:1px solid #333;">' . $op->getrel_lev($relInfo["rel_lev"]) . '</td>
                    <td style="border:1px solid #333;">' . $relInfo["rel_Address"] . '</td>
                    <td style="border:1px solid #333;">' . $relInfo["rel_email"] . '</td>
                    <td style="border:1px solid #333;">' . $relInfo["rel_Address"] . '</td>
                    <td style="border:1px solid #333;">' . $relInfo["rel_phones"] . '</td>
                </tr>';

    $i++;
endforeach;
$con .= '
    </table> 
    <br>
    <br>
    <table border="1" style="font-size:16px" >
        <tr>
            <td colspan="5" class="text-center"> المؤهلات العلمية للطالب </td>
        </tr>
        <tr>
            <td class="p-1 " style="color: #000;"> المسلسل</td>
            <td class="p-1 " style="color: #000;"> درجة المؤهل </td>
            <td class="p-1 " style="color: #000;"> تاريخ المؤهل </td>
            <td class="p-1 " style="color: #000;"> جهة المؤهل </td>
            <td class="p-1 " style="color: #000;"> لغة المؤهل </td>
        </tr>';
$i = 1;
$rt = $op->getStuRelIquali();
foreach ((array) $rt as $edu_eql_ifo) :
    $con .= ' <tr>
                    <td style="border:1px solid #333;">' . $i . '</td>
                    <td  style="font-size:90%;color:#000">' . $edu_eql_ifo["Edu_quali"] . '</td>
                    <td style="border:1px solid #333;"> ' . $edu_eql_ifo["Edu_year"] . ' </td>
                    <td style="border:1px solid #333;">' . $edu_eql_ifo["Edu_Issuer"] . ' </td>
                    <td style="border:1px solid #333;">' . $edu_eql_ifo["Edu_lang"] . ' </td>

                </tr>';

    $i++;
endforeach;
$con .=
    '
    </table> 
    <br>
    <br>
    <table border="1" style="font-size:16px" >
        <tr>
            <td colspan="7" class="text-center"> المعلومات الأكاديمية </td>
        </tr>
        </table>';
$i = 1;
$rts = $op->getStudentacademicPro();
foreach ((array) $rts as $porg_info) :
    $con .= '<br><br><table border="1" style="font-size:16px" >
    <tr>  <td colspan="7" style="color: #000;border:1px solid #333;"> ' . $op->FulltextProgInfo($porg_info["prog_id"]) . '</td></tr> 
        
        <tr>  
            <td  style="color: #fff;background-color:#000;border:1px solid #333;"> المستوى </td>
            <td  style="color: #fff;background-color:#000;border:1px solid #333;"> الفترة </td>
            <td  style="color: #fff;background-color:#000;border:1px solid #333;"> القسم </td>
            <td  style="color: #fff;background-color:#000;border:1px solid #333;"> المجموعة </td>
            <td  style="color: #fff;background-color:#000;border:1px solid #333;"> تاريخ التسجيل </td>
            <td  style="color: #fff;background-color:#000;border:1px solid #333;"> خصم خاص </td>
            <td  style="color: #fff;background-color:#000;border:1px solid #333;"> الحالة </td>
        </tr>  
         <tr>
                    <td   style="border:1px solid #333;">' . $op->GetSellevelsTxt($porg_info["lev_id"]) . '</td>
                    <td   style="border:1px solid #333;">' . $op->getSelDepartmentTxt($porg_info["dep_id"]) . '</td>
                    <td   style="border:1px solid #333;">' . $op->getSelesectionTxt($porg_info["sec_id"]) . '</td>
                    <td style="border:1px solid #333;">' . $op->GetSelgroupsTxt($porg_info["grp_id"]) . '</td>
                    <td style="border:1px solid #333;">' . $porg_info["reg_date"] . ' </td>
                    <td style="border:1px solid #333;">' . $porg_info["Prog_Discount"] . ' </td>
                    <td style="border:1px solid #333;">' . $porg_info["statues"]  . '</td>
                </tr></table>';

    $i++;
endforeach;

$op->pdfData("معلومات الطالب", "معلومات الطالب", $con); ?>
<script>
    window.print();


    window.addEventListener('afterprint', (event) => {
        window.close();
    });
</script>