<?php
require  getcwd() . '/lib/tcpdf/tcpdf.php';
class pdf extends tcpdf
{
    public function Header( ){
        $fontname = TCPDF_FONTS::addTTFfont(getcwd() . '/lib/tcpdf/customfont/majalla.ttf', '', '', 32);
        $this->SetFont($fontname , "b" ); 
        $this->image( getcwd() . "/assets/img/printLogo.png" , 5 , 3 , 200  , 25  , "png" , "" , "R" , false , 300 , "" , false , false , 0 , false , false, false ) ;
        $this->Ln(15);   
    }

    function Footer(){
        $op = new Khas();
        $fontname = TCPDF_FONTS::addTTFfont(getcwd() . '/lib/tcpdf/customfont/majalla.ttf', '', '', 32);
       
        $this->SetFont($fontname, "b"); 
        $this->SetY(-20);
        $address = $op->siteSetting('siteAddr');
        $this->writeHTML("<hr>", true, false, true, false, 'R');
        $footer  = '<div  style="text-align:center;position: fixed;left: 0;bottom: 15px; width: 100%;">
                                ' . $address . '<br>
                                ' . $op->siteSetting('sitePhones') . '-
                                ' . $op->siteSetting('siteEmail') . '
                        </div>'; 
        $this->writeHTML($footer, true, false, true, false, 'R');
    }

    public function  head_title( string $title){
         
        $this->SetFontSize(14);
        $this->Cell(180, 5, "$title", 0, 1, 'C');
        $this->Ln(2);

  
    }



    public function custome_footer($firstString = "", $secondtString = "", $therdString = "", $foruthString = "")
    {
        $this->Ln(15);
        
        $footer  = '<table  border="0" cellpadding="3"  >
                <tr>
                    <td style="text-align:center;">'. $firstString. '</td>
                    <td style="text-align:center;">' . $therdString. ' </td>
                </tr>
                <tr>
                    <td style="text-align:center;">' . $secondtString  . '</td>
                    <td style="text-align:center;"> ' . $foruthString . ' </td>
                </tr>
           
        </table>';
      
        return $footer;
        
    }


    public function custome_Image($imgSrc)
    {
        //return $this->Image($imgSrc, 15, 140, 75, 113, 'JPG', '', '', true, 150, '', false, false, 1, false, false, false);
        return $this->Image($imgSrc, 500);
    }


  
}
 