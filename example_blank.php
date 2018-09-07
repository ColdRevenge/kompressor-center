<?php
include_once("config.php");
ini_set("display_errors", "on");
error_reporting(E_ALL);
//ob_start();
header("Content-type: text/html; charset=windows-1251");
//mb_internal_encoding('UTF-8');
//setlocale (LC_ALL, "ru_RU.UTF-8");

$shop = 'lalipop';
$shop_type = 1;
if (isset($_SERVER['HTTP_HOST'])) {
    switch ($_SERVER['HTTP_HOST']) {
        case 'lady.lalipop.ru':
            $shop = 'lady';
            $shop_type = 2;
            break;
        case 'platok.lalipop.ru':
            $shop = 'platok';
            $shop_type = 3;
            break;
        case 'sumka.lalipop.ru':
            $shop = 'sumka';
            $shop_type = 4;
            break;
    }
}
ob_start();

try {
    if (isset($_GET['order_id'])) {
        $config = new Config();
        include_once $config->getDocumentRoot() . $config->getFolder() . '/config_path.php';

        $registry = Registry::getInstance();
        include_once $registry->base_dir . 'modules/order/models/Order.php';
        include_once $registry->base_dir . 'class/Application.php';
        $orders = new Order();
        $order = $orders->getOrderId($_GET['order_id']);

        if (isset($order->id)) {
            $products = $orders->geProductsOrderId($order->id);
        } else {
            echo 'Ошибка 2';
            exit();
        }
    } else {
        echo 'Ошибка 1';
        exit();
    }
} catch (Exception $e) {
    echo $e->getMessage();
    exit();
}
$title = 'Интернет магазин товаров для женщин';
$phone = '8(495)642-38-53,   8(926)436-26-42';
$email = 'info@lalipop.ru';
$logo = 'http://lalipop.ru/images/fronted/logo-lalipop.jpg';
$site = 'http://lalipop.ru/'
?>
<html xmlns:v="urn:schemas-microsoft-com:vml"
      xmlns:o="urn:schemas-microsoft-com:office:office"
      xmlns:w="urn:schemas-microsoft-com:office:word"
      xmlns:m="http://schemas.microsoft.com/office/2004/12/omml"
      xmlns="http://www.w3.org/TR/REC-html40">

    <head>
        <meta http-equiv=Content-Type content="text/html; charset=windows-1251">
            <meta name=ProgId content=Word.Document>
                <meta name=Generator content="Microsoft Word 12">
                    <meta name=Originator content="Microsoft Word 12">
                        <link rel=File-List href="blank_1433412161%20(1).files/filelist.xml">
                            <link rel=Edit-Time-Data href="blank_1433412161%20(1).files/editdata.mso">
                                <!--[if !mso]>
                                <style>
                                v\:* {behavior:url(#default#VML);}
                                o\:* {behavior:url(#default#VML);}
                                w\:* {behavior:url(#default#VML);}
                                .shape {behavior:url(#default#VML);}
                                </style>
                                <![endif]--><!--[if gte mso 9]><xml>
                                 <o:DocumentProperties>
                                  <o:Author>kisa</o:Author>
                                  <o:Template>Normal</o:Template>
                                  <o:LastAuthor>Komp</o:LastAuthor>
                                  <o:Revision>2</o:Revision>
                                  <o:TotalTime>26</o:TotalTime>
                                  <o:LastPrinted>2015-06-04T09:13:00Z</o:LastPrinted>
                                  <o:Created>2015-06-04T14:37:00Z</o:Created>
                                  <o:LastSaved>2015-06-04T14:37:00Z</o:LastSaved>
                                  <o:Pages>1</o:Pages>
                                  <o:Words>189</o:Words>
                                  <o:Characters>1082</o:Characters>
                                  <o:Company>DG Win&amp;Soft</o:Company>
                                  <o:Lines>9</o:Lines>
                                  <o:Paragraphs>2</o:Paragraphs>
                                  <o:CharactersWithSpaces>1269</o:CharactersWithSpaces>
                                  <o:Version>12.00</o:Version>
                                 </o:DocumentProperties>
                                </xml><![endif]-->
                                <link rel=themeData href="blank_1433412161%20(1).files/themedata.thmx">
                                    <link rel=colorSchemeMapping
                                          href="blank_1433412161%20(1).files/colorschememapping.xml">
                                        <!--[if gte mso 9]><xml>
                                         <w:WordDocument>
                                          <w:View>Print</w:View>
                                          <w:Zoom>120</w:Zoom>
                                          <w:TrackMoves>false</w:TrackMoves>
                                          <w:TrackFormatting/>
                                          <w:ValidateAgainstSchemas/>
                                          <w:SaveIfXMLInvalid>false</w:SaveIfXMLInvalid>
                                          <w:IgnoreMixedContent>false</w:IgnoreMixedContent>
                                          <w:AlwaysShowPlaceholderText>false</w:AlwaysShowPlaceholderText>
                                          <w:DoNotPromoteQF/>
                                          <w:LidThemeOther>RU</w:LidThemeOther>
                                          <w:LidThemeAsian>X-NONE</w:LidThemeAsian>
                                          <w:LidThemeComplexScript>X-NONE</w:LidThemeComplexScript>
                                          <w:Compatibility>
                                           <w:BreakWrappedTables/>
                                           <w:SnapToGridInCell/>
                                           <w:WrapTextWithPunct/>
                                           <w:UseAsianBreakRules/>
                                           <w:DontGrowAutofit/>
                                           <w:SplitPgBreakAndParaMark/>
                                           <w:DontVertAlignCellWithSp/>
                                           <w:DontBreakConstrainedForcedTables/>
                                           <w:DontVertAlignInTxbx/>
                                           <w:Word11KerningPairs/>
                                           <w:CachedColBalance/>
                                          </w:Compatibility>
                                          <w:BrowserLevel>MicrosoftInternetExplorer4</w:BrowserLevel>
                                          <m:mathPr>
                                           <m:mathFont m:val="Cambria Math"/>
                                           <m:brkBin m:val="before"/>
                                           <m:brkBinSub m:val="--"/>
                                           <m:smallFrac m:val="off"/>
                                           <m:dispDef/>
                                           <m:lMargin m:val="0"/>
                                           <m:rMargin m:val="0"/>
                                           <m:defJc m:val="centerGroup"/>
                                           <m:wrapIndent m:val="1440"/>
                                           <m:intLim m:val="subSup"/>
                                           <m:naryLim m:val="undOvr"/>
                                          </m:mathPr></w:WordDocument>
                                        </xml><![endif]--><!--[if gte mso 9]><xml>
                                         <w:LatentStyles DefLockedState="false" DefUnhideWhenUsed="true"
                                          DefSemiHidden="true" DefQFormat="false" DefPriority="99"
                                          LatentStyleCount="267">
                                          <w:LsdException Locked="false" Priority="0" SemiHidden="false"
                                           UnhideWhenUsed="false" QFormat="true" Name="Normal"/>
                                          <w:LsdException Locked="false" Priority="9" SemiHidden="false"
                                           UnhideWhenUsed="false" QFormat="true" Name="heading 1"/>
                                          <w:LsdException Locked="false" Priority="9" QFormat="true" Name="heading 2"/>
                                          <w:LsdException Locked="false" Priority="9" QFormat="true" Name="heading 3"/>
                                          <w:LsdException Locked="false" Priority="9" QFormat="true" Name="heading 4"/>
                                          <w:LsdException Locked="false" Priority="9" QFormat="true" Name="heading 5"/>
                                          <w:LsdException Locked="false" Priority="9" QFormat="true" Name="heading 6"/>
                                          <w:LsdException Locked="false" Priority="9" QFormat="true" Name="heading 7"/>
                                          <w:LsdException Locked="false" Priority="9" QFormat="true" Name="heading 8"/>
                                          <w:LsdException Locked="false" Priority="9" QFormat="true" Name="heading 9"/>
                                          <w:LsdException Locked="false" Priority="39" Name="toc 1"/>
                                          <w:LsdException Locked="false" Priority="39" Name="toc 2"/>
                                          <w:LsdException Locked="false" Priority="39" Name="toc 3"/>
                                          <w:LsdException Locked="false" Priority="39" Name="toc 4"/>
                                          <w:LsdException Locked="false" Priority="39" Name="toc 5"/>
                                          <w:LsdException Locked="false" Priority="39" Name="toc 6"/>
                                          <w:LsdException Locked="false" Priority="39" Name="toc 7"/>
                                          <w:LsdException Locked="false" Priority="39" Name="toc 8"/>
                                          <w:LsdException Locked="false" Priority="39" Name="toc 9"/>
                                          <w:LsdException Locked="false" Priority="35" QFormat="true" Name="caption"/>
                                          <w:LsdException Locked="false" Priority="10" SemiHidden="false"
                                           UnhideWhenUsed="false" QFormat="true" Name="Title"/>
                                          <w:LsdException Locked="false" Priority="1" Name="Default Paragraph Font"/>
                                          <w:LsdException Locked="false" Priority="11" SemiHidden="false"
                                           UnhideWhenUsed="false" QFormat="true" Name="Subtitle"/>
                                          <w:LsdException Locked="false" Priority="22" SemiHidden="false"
                                           UnhideWhenUsed="false" QFormat="true" Name="Strong"/>
                                          <w:LsdException Locked="false" Priority="20" SemiHidden="false"
                                           UnhideWhenUsed="false" QFormat="true" Name="Emphasis"/>
                                          <w:LsdException Locked="false" Priority="59" SemiHidden="false"
                                           UnhideWhenUsed="false" Name="Table Grid"/>
                                          <w:LsdException Locked="false" UnhideWhenUsed="false" Name="Placeholder Text"/>
                                          <w:LsdException Locked="false" Priority="1" SemiHidden="false"
                                           UnhideWhenUsed="false" QFormat="true" Name="No Spacing"/>
                                          <w:LsdException Locked="false" Priority="60" SemiHidden="false"
                                           UnhideWhenUsed="false" Name="Light Shading"/>
                                          <w:LsdException Locked="false" Priority="61" SemiHidden="false"
                                           UnhideWhenUsed="false" Name="Light List"/>
                                          <w:LsdException Locked="false" Priority="62" SemiHidden="false"
                                           UnhideWhenUsed="false" Name="Light Grid"/>
                                          <w:LsdException Locked="false" Priority="63" SemiHidden="false"
                                           UnhideWhenUsed="false" Name="Medium Shading 1"/>
                                          <w:LsdException Locked="false" Priority="64" SemiHidden="false"
                                           UnhideWhenUsed="false" Name="Medium Shading 2"/>
                                          <w:LsdException Locked="false" Priority="65" SemiHidden="false"
                                           UnhideWhenUsed="false" Name="Medium List 1"/>
                                          <w:LsdException Locked="false" Priority="66" SemiHidden="false"
                                           UnhideWhenUsed="false" Name="Medium List 2"/>
                                          <w:LsdException Locked="false" Priority="67" SemiHidden="false"
                                           UnhideWhenUsed="false" Name="Medium Grid 1"/>
                                          <w:LsdException Locked="false" Priority="68" SemiHidden="false"
                                           UnhideWhenUsed="false" Name="Medium Grid 2"/>
                                          <w:LsdException Locked="false" Priority="69" SemiHidden="false"
                                           UnhideWhenUsed="false" Name="Medium Grid 3"/>
                                          <w:LsdException Locked="false" Priority="70" SemiHidden="false"
                                           UnhideWhenUsed="false" Name="Dark List"/>
                                          <w:LsdException Locked="false" Priority="71" SemiHidden="false"
                                           UnhideWhenUsed="false" Name="Colorful Shading"/>
                                          <w:LsdException Locked="false" Priority="72" SemiHidden="false"
                                           UnhideWhenUsed="false" Name="Colorful List"/>
                                          <w:LsdException Locked="false" Priority="73" SemiHidden="false"
                                           UnhideWhenUsed="false" Name="Colorful Grid"/>
                                          <w:LsdException Locked="false" Priority="60" SemiHidden="false"
                                           UnhideWhenUsed="false" Name="Light Shading Accent 1"/>
                                          <w:LsdException Locked="false" Priority="61" SemiHidden="false"
                                           UnhideWhenUsed="false" Name="Light List Accent 1"/>
                                          <w:LsdException Locked="false" Priority="62" SemiHidden="false"
                                           UnhideWhenUsed="false" Name="Light Grid Accent 1"/>
                                          <w:LsdException Locked="false" Priority="63" SemiHidden="false"
                                           UnhideWhenUsed="false" Name="Medium Shading 1 Accent 1"/>
                                          <w:LsdException Locked="false" Priority="64" SemiHidden="false"
                                           UnhideWhenUsed="false" Name="Medium Shading 2 Accent 1"/>
                                          <w:LsdException Locked="false" Priority="65" SemiHidden="false"
                                           UnhideWhenUsed="false" Name="Medium List 1 Accent 1"/>
                                          <w:LsdException Locked="false" UnhideWhenUsed="false" Name="Revision"/>
                                          <w:LsdException Locked="false" Priority="34" SemiHidden="false"
                                           UnhideWhenUsed="false" QFormat="true" Name="List Paragraph"/>
                                          <w:LsdException Locked="false" Priority="29" SemiHidden="false"
                                           UnhideWhenUsed="false" QFormat="true" Name="Quote"/>
                                          <w:LsdException Locked="false" Priority="30" SemiHidden="false"
                                           UnhideWhenUsed="false" QFormat="true" Name="Intense Quote"/>
                                          <w:LsdException Locked="false" Priority="66" SemiHidden="false"
                                           UnhideWhenUsed="false" Name="Medium List 2 Accent 1"/>
                                          <w:LsdException Locked="false" Priority="67" SemiHidden="false"
                                           UnhideWhenUsed="false" Name="Medium Grid 1 Accent 1"/>
                                          <w:LsdException Locked="false" Priority="68" SemiHidden="false"
                                           UnhideWhenUsed="false" Name="Medium Grid 2 Accent 1"/>
                                          <w:LsdException Locked="false" Priority="69" SemiHidden="false"
                                           UnhideWhenUsed="false" Name="Medium Grid 3 Accent 1"/>
                                          <w:LsdException Locked="false" Priority="70" SemiHidden="false"
                                           UnhideWhenUsed="false" Name="Dark List Accent 1"/>
                                          <w:LsdException Locked="false" Priority="71" SemiHidden="false"
                                           UnhideWhenUsed="false" Name="Colorful Shading Accent 1"/>
                                          <w:LsdException Locked="false" Priority="72" SemiHidden="false"
                                           UnhideWhenUsed="false" Name="Colorful List Accent 1"/>
                                          <w:LsdException Locked="false" Priority="73" SemiHidden="false"
                                           UnhideWhenUsed="false" Name="Colorful Grid Accent 1"/>
                                          <w:LsdException Locked="false" Priority="60" SemiHidden="false"
                                           UnhideWhenUsed="false" Name="Light Shading Accent 2"/>
                                          <w:LsdException Locked="false" Priority="61" SemiHidden="false"
                                           UnhideWhenUsed="false" Name="Light List Accent 2"/>
                                          <w:LsdException Locked="false" Priority="62" SemiHidden="false"
                                           UnhideWhenUsed="false" Name="Light Grid Accent 2"/>
                                          <w:LsdException Locked="false" Priority="63" SemiHidden="false"
                                           UnhideWhenUsed="false" Name="Medium Shading 1 Accent 2"/>
                                          <w:LsdException Locked="false" Priority="64" SemiHidden="false"
                                           UnhideWhenUsed="false" Name="Medium Shading 2 Accent 2"/>
                                          <w:LsdException Locked="false" Priority="65" SemiHidden="false"
                                           UnhideWhenUsed="false" Name="Medium List 1 Accent 2"/>
                                          <w:LsdException Locked="false" Priority="66" SemiHidden="false"
                                           UnhideWhenUsed="false" Name="Medium List 2 Accent 2"/>
                                          <w:LsdException Locked="false" Priority="67" SemiHidden="false"
                                           UnhideWhenUsed="false" Name="Medium Grid 1 Accent 2"/>
                                          <w:LsdException Locked="false" Priority="68" SemiHidden="false"
                                           UnhideWhenUsed="false" Name="Medium Grid 2 Accent 2"/>
                                          <w:LsdException Locked="false" Priority="69" SemiHidden="false"
                                           UnhideWhenUsed="false" Name="Medium Grid 3 Accent 2"/>
                                          <w:LsdException Locked="false" Priority="70" SemiHidden="false"
                                           UnhideWhenUsed="false" Name="Dark List Accent 2"/>
                                          <w:LsdException Locked="false" Priority="71" SemiHidden="false"
                                           UnhideWhenUsed="false" Name="Colorful Shading Accent 2"/>
                                          <w:LsdException Locked="false" Priority="72" SemiHidden="false"
                                           UnhideWhenUsed="false" Name="Colorful List Accent 2"/>
                                          <w:LsdException Locked="false" Priority="73" SemiHidden="false"
                                           UnhideWhenUsed="false" Name="Colorful Grid Accent 2"/>
                                          <w:LsdException Locked="false" Priority="60" SemiHidden="false"
                                           UnhideWhenUsed="false" Name="Light Shading Accent 3"/>
                                          <w:LsdException Locked="false" Priority="61" SemiHidden="false"
                                           UnhideWhenUsed="false" Name="Light List Accent 3"/>
                                          <w:LsdException Locked="false" Priority="62" SemiHidden="false"
                                           UnhideWhenUsed="false" Name="Light Grid Accent 3"/>
                                          <w:LsdException Locked="false" Priority="63" SemiHidden="false"
                                           UnhideWhenUsed="false" Name="Medium Shading 1 Accent 3"/>
                                          <w:LsdException Locked="false" Priority="64" SemiHidden="false"
                                           UnhideWhenUsed="false" Name="Medium Shading 2 Accent 3"/>
                                          <w:LsdException Locked="false" Priority="65" SemiHidden="false"
                                           UnhideWhenUsed="false" Name="Medium List 1 Accent 3"/>
                                          <w:LsdException Locked="false" Priority="66" SemiHidden="false"
                                           UnhideWhenUsed="false" Name="Medium List 2 Accent 3"/>
                                          <w:LsdException Locked="false" Priority="67" SemiHidden="false"
                                           UnhideWhenUsed="false" Name="Medium Grid 1 Accent 3"/>
                                          <w:LsdException Locked="false" Priority="68" SemiHidden="false"
                                           UnhideWhenUsed="false" Name="Medium Grid 2 Accent 3"/>
                                          <w:LsdException Locked="false" Priority="69" SemiHidden="false"
                                           UnhideWhenUsed="false" Name="Medium Grid 3 Accent 3"/>
                                          <w:LsdException Locked="false" Priority="70" SemiHidden="false"
                                           UnhideWhenUsed="false" Name="Dark List Accent 3"/>
                                          <w:LsdException Locked="false" Priority="71" SemiHidden="false"
                                           UnhideWhenUsed="false" Name="Colorful Shading Accent 3"/>
                                          <w:LsdException Locked="false" Priority="72" SemiHidden="false"
                                           UnhideWhenUsed="false" Name="Colorful List Accent 3"/>
                                          <w:LsdException Locked="false" Priority="73" SemiHidden="false"
                                           UnhideWhenUsed="false" Name="Colorful Grid Accent 3"/>
                                          <w:LsdException Locked="false" Priority="60" SemiHidden="false"
                                           UnhideWhenUsed="false" Name="Light Shading Accent 4"/>
                                          <w:LsdException Locked="false" Priority="61" SemiHidden="false"
                                           UnhideWhenUsed="false" Name="Light List Accent 4"/>
                                          <w:LsdException Locked="false" Priority="62" SemiHidden="false"
                                           UnhideWhenUsed="false" Name="Light Grid Accent 4"/>
                                          <w:LsdException Locked="false" Priority="63" SemiHidden="false"
                                           UnhideWhenUsed="false" Name="Medium Shading 1 Accent 4"/>
                                          <w:LsdException Locked="false" Priority="64" SemiHidden="false"
                                           UnhideWhenUsed="false" Name="Medium Shading 2 Accent 4"/>
                                          <w:LsdException Locked="false" Priority="65" SemiHidden="false"
                                           UnhideWhenUsed="false" Name="Medium List 1 Accent 4"/>
                                          <w:LsdException Locked="false" Priority="66" SemiHidden="false"
                                           UnhideWhenUsed="false" Name="Medium List 2 Accent 4"/>
                                          <w:LsdException Locked="false" Priority="67" SemiHidden="false"
                                           UnhideWhenUsed="false" Name="Medium Grid 1 Accent 4"/>
                                          <w:LsdException Locked="false" Priority="68" SemiHidden="false"
                                           UnhideWhenUsed="false" Name="Medium Grid 2 Accent 4"/>
                                          <w:LsdException Locked="false" Priority="69" SemiHidden="false"
                                           UnhideWhenUsed="false" Name="Medium Grid 3 Accent 4"/>
                                          <w:LsdException Locked="false" Priority="70" SemiHidden="false"
                                           UnhideWhenUsed="false" Name="Dark List Accent 4"/>
                                          <w:LsdException Locked="false" Priority="71" SemiHidden="false"
                                           UnhideWhenUsed="false" Name="Colorful Shading Accent 4"/>
                                          <w:LsdException Locked="false" Priority="72" SemiHidden="false"
                                           UnhideWhenUsed="false" Name="Colorful List Accent 4"/>
                                          <w:LsdException Locked="false" Priority="73" SemiHidden="false"
                                           UnhideWhenUsed="false" Name="Colorful Grid Accent 4"/>
                                          <w:LsdException Locked="false" Priority="60" SemiHidden="false"
                                           UnhideWhenUsed="false" Name="Light Shading Accent 5"/>
                                          <w:LsdException Locked="false" Priority="61" SemiHidden="false"
                                           UnhideWhenUsed="false" Name="Light List Accent 5"/>
                                          <w:LsdException Locked="false" Priority="62" SemiHidden="false"
                                           UnhideWhenUsed="false" Name="Light Grid Accent 5"/>
                                          <w:LsdException Locked="false" Priority="63" SemiHidden="false"
                                           UnhideWhenUsed="false" Name="Medium Shading 1 Accent 5"/>
                                          <w:LsdException Locked="false" Priority="64" SemiHidden="false"
                                           UnhideWhenUsed="false" Name="Medium Shading 2 Accent 5"/>
                                          <w:LsdException Locked="false" Priority="65" SemiHidden="false"
                                           UnhideWhenUsed="false" Name="Medium List 1 Accent 5"/>
                                          <w:LsdException Locked="false" Priority="66" SemiHidden="false"
                                           UnhideWhenUsed="false" Name="Medium List 2 Accent 5"/>
                                          <w:LsdException Locked="false" Priority="67" SemiHidden="false"
                                           UnhideWhenUsed="false" Name="Medium Grid 1 Accent 5"/>
                                          <w:LsdException Locked="false" Priority="68" SemiHidden="false"
                                           UnhideWhenUsed="false" Name="Medium Grid 2 Accent 5"/>
                                          <w:LsdException Locked="false" Priority="69" SemiHidden="false"
                                           UnhideWhenUsed="false" Name="Medium Grid 3 Accent 5"/>
                                          <w:LsdException Locked="false" Priority="70" SemiHidden="false"
                                           UnhideWhenUsed="false" Name="Dark List Accent 5"/>
                                          <w:LsdException Locked="false" Priority="71" SemiHidden="false"
                                           UnhideWhenUsed="false" Name="Colorful Shading Accent 5"/>
                                          <w:LsdException Locked="false" Priority="72" SemiHidden="false"
                                           UnhideWhenUsed="false" Name="Colorful List Accent 5"/>
                                          <w:LsdException Locked="false" Priority="73" SemiHidden="false"
                                           UnhideWhenUsed="false" Name="Colorful Grid Accent 5"/>
                                          <w:LsdException Locked="false" Priority="60" SemiHidden="false"
                                           UnhideWhenUsed="false" Name="Light Shading Accent 6"/>
                                          <w:LsdException Locked="false" Priority="61" SemiHidden="false"
                                           UnhideWhenUsed="false" Name="Light List Accent 6"/>
                                          <w:LsdException Locked="false" Priority="62" SemiHidden="false"
                                           UnhideWhenUsed="false" Name="Light Grid Accent 6"/>
                                          <w:LsdException Locked="false" Priority="63" SemiHidden="false"
                                           UnhideWhenUsed="false" Name="Medium Shading 1 Accent 6"/>
                                          <w:LsdException Locked="false" Priority="64" SemiHidden="false"
                                           UnhideWhenUsed="false" Name="Medium Shading 2 Accent 6"/>
                                          <w:LsdException Locked="false" Priority="65" SemiHidden="false"
                                           UnhideWhenUsed="false" Name="Medium List 1 Accent 6"/>
                                          <w:LsdException Locked="false" Priority="66" SemiHidden="false"
                                           UnhideWhenUsed="false" Name="Medium List 2 Accent 6"/>
                                          <w:LsdException Locked="false" Priority="67" SemiHidden="false"
                                           UnhideWhenUsed="false" Name="Medium Grid 1 Accent 6"/>
                                          <w:LsdException Locked="false" Priority="68" SemiHidden="false"
                                           UnhideWhenUsed="false" Name="Medium Grid 2 Accent 6"/>
                                          <w:LsdException Locked="false" Priority="69" SemiHidden="false"
                                           UnhideWhenUsed="false" Name="Medium Grid 3 Accent 6"/>
                                          <w:LsdException Locked="false" Priority="70" SemiHidden="false"
                                           UnhideWhenUsed="false" Name="Dark List Accent 6"/>
                                          <w:LsdException Locked="false" Priority="71" SemiHidden="false"
                                           UnhideWhenUsed="false" Name="Colorful Shading Accent 6"/>
                                          <w:LsdException Locked="false" Priority="72" SemiHidden="false"
                                           UnhideWhenUsed="false" Name="Colorful List Accent 6"/>
                                          <w:LsdException Locked="false" Priority="73" SemiHidden="false"
                                           UnhideWhenUsed="false" Name="Colorful Grid Accent 6"/>
                                          <w:LsdException Locked="false" Priority="19" SemiHidden="false"
                                           UnhideWhenUsed="false" QFormat="true" Name="Subtle Emphasis"/>
                                          <w:LsdException Locked="false" Priority="21" SemiHidden="false"
                                           UnhideWhenUsed="false" QFormat="true" Name="Intense Emphasis"/>
                                          <w:LsdException Locked="false" Priority="31" SemiHidden="false"
                                           UnhideWhenUsed="false" QFormat="true" Name="Subtle Reference"/>
                                          <w:LsdException Locked="false" Priority="32" SemiHidden="false"
                                           UnhideWhenUsed="false" QFormat="true" Name="Intense Reference"/>
                                          <w:LsdException Locked="false" Priority="33" SemiHidden="false"
                                           UnhideWhenUsed="false" QFormat="true" Name="Book Title"/>
                                          <w:LsdException Locked="false" Priority="37" Name="Bibliography"/>
                                          <w:LsdException Locked="false" Priority="39" QFormat="true" Name="TOC Heading"/>
                                         </w:LatentStyles>
                                        </xml><![endif]-->
                                        <style>
                                            <!--
                                            /* Font Definitions */
                                            @font-face
                                            {font-family:Vrinda;
                                             panose-1:2 11 5 2 4 2 4 2 2 3;
                                             mso-font-charset:0;
                                             mso-generic-font-family:swiss;
                                             mso-font-pitch:variable;
                                             mso-font-signature:65539 0 0 0 1 0;}
                                            @font-face
                                            {font-family:"Cambria Math";
                                             panose-1:2 4 5 3 5 4 6 3 2 4;
                                             mso-font-charset:204;
                                             mso-generic-font-family:roman;
                                             mso-font-pitch:variable;
                                             mso-font-signature:-536870145 1107305727 0 0 415 0;}
                                            @font-face
                                            {font-family:Calibri;
                                             panose-1:2 15 5 2 2 2 4 3 2 4;
                                             mso-font-charset:204;
                                             mso-generic-font-family:swiss;
                                             mso-font-pitch:variable;
                                             mso-font-signature:-536870145 1073786111 1 0 415 0;}
                                            @font-face
                                            {font-family:Tahoma;
                                             panose-1:2 11 6 4 3 5 4 4 2 4;
                                             mso-font-charset:204;
                                             mso-generic-font-family:swiss;
                                             mso-font-pitch:variable;
                                             mso-font-signature:-520081665 -1073717157 41 0 66047 0;}
                                            /* Style Definitions */
                                            p.MsoNormal, li.MsoNormal, div.MsoNormal
                                            {mso-style-unhide:no;
                                             mso-style-qformat:yes;
                                             mso-style-parent:"";
                                             margin-top:0cm;
                                             margin-right:0cm;
                                             margin-bottom:10.0pt;
                                             margin-left:0cm;
                                             line-height:115%;
                                             mso-pagination:widow-orphan;
                                             font-size:11.0pt;
                                             font-family:"Calibri","sans-serif";
                                             mso-fareast-font-family:"Times New Roman";
                                             mso-fareast-theme-font:minor-fareast;
                                             mso-bidi-font-family:"Times New Roman";}
                                            p.MsoHeader, li.MsoHeader, div.MsoHeader
                                            {mso-style-noshow:yes;
                                             mso-style-priority:99;
                                             mso-style-link:"Верхний колонтитул Знак";
                                             margin:0cm;
                                             margin-bottom:.0001pt;
                                             mso-pagination:widow-orphan;
                                             font-size:11.0pt;
                                             font-family:"Calibri","sans-serif";
                                             mso-fareast-font-family:"Times New Roman";
                                             mso-fareast-theme-font:minor-fareast;
                                             mso-bidi-font-family:"Times New Roman";}
                                            p.MsoFooter, li.MsoFooter, div.MsoFooter
                                            {mso-style-noshow:yes;
                                             mso-style-priority:99;
                                             mso-style-link:"Нижний колонтитул Знак";
                                             margin:0cm;
                                             margin-bottom:.0001pt;
                                             mso-pagination:widow-orphan;
                                             font-size:11.0pt;
                                             font-family:"Calibri","sans-serif";
                                             mso-fareast-font-family:"Times New Roman";
                                             mso-fareast-theme-font:minor-fareast;
                                             mso-bidi-font-family:"Times New Roman";}
                                            a:link, span.MsoHyperlink
                                            {mso-style-noshow:yes;
                                             mso-style-priority:99;
                                             color:blue;
                                             text-decoration:underline;
                                             text-underline:single;}
                                            a:visited, span.MsoHyperlinkFollowed
                                            {mso-style-noshow:yes;
                                             mso-style-priority:99;
                                             color:purple;
                                             text-decoration:underline;
                                             text-underline:single;}
                                            p.MsoAcetate, li.MsoAcetate, div.MsoAcetate
                                            {mso-style-noshow:yes;
                                             mso-style-priority:99;
                                             mso-style-link:"Текст выноски Знак";
                                             margin:0cm;
                                             margin-bottom:.0001pt;
                                             mso-pagination:widow-orphan;
                                             font-size:8.0pt;
                                             font-family:"Tahoma","sans-serif";
                                             mso-fareast-font-family:"Times New Roman";
                                             mso-fareast-theme-font:minor-fareast;}
                                            span.a
                                            {mso-style-name:"Верхний колонтитул Знак";
                                             mso-style-noshow:yes;
                                             mso-style-priority:99;
                                             mso-style-unhide:no;
                                             mso-style-locked:yes;
                                             mso-style-link:"Верхний колонтитул";}
                                            span.a0
                                            {mso-style-name:"Нижний колонтитул Знак";
                                             mso-style-noshow:yes;
                                             mso-style-priority:99;
                                             mso-style-unhide:no;
                                             mso-style-locked:yes;
                                             mso-style-link:"Нижний колонтитул";}
                                            span.a1
                                            {mso-style-name:"Текст выноски Знак";
                                             mso-style-noshow:yes;
                                             mso-style-priority:99;
                                             mso-style-unhide:no;
                                             mso-style-locked:yes;
                                             mso-style-link:"Текст выноски";
                                             mso-ansi-font-size:8.0pt;
                                             mso-bidi-font-size:8.0pt;
                                             font-family:"Tahoma","sans-serif";
                                             mso-ascii-font-family:Tahoma;
                                             mso-fareast-font-family:"Times New Roman";
                                             mso-fareast-theme-font:minor-fareast;
                                             mso-hansi-font-family:Tahoma;
                                             mso-bidi-font-family:Tahoma;}
                                            p.msochpdefault, li.msochpdefault, div.msochpdefault
                                            {mso-style-name:msochpdefault;
                                             mso-style-unhide:no;
                                             mso-margin-top-alt:auto;
                                             margin-right:0cm;
                                             mso-margin-bottom-alt:auto;
                                             margin-left:0cm;
                                             mso-pagination:widow-orphan;
                                             font-size:12.0pt;
                                             font-family:"Calibri","sans-serif";
                                             mso-fareast-font-family:"Times New Roman";
                                             mso-fareast-theme-font:minor-fareast;
                                             mso-bidi-font-family:Calibri;}
                                            p.msopapdefault, li.msopapdefault, div.msopapdefault
                                            {mso-style-name:msopapdefault;
                                             mso-style-unhide:no;
                                             mso-margin-top-alt:auto;
                                             margin-right:0cm;
                                             margin-bottom:10.0pt;
                                             margin-left:0cm;
                                             line-height:115%;
                                             mso-pagination:widow-orphan;
                                             font-size:12.0pt;
                                             font-family:"Times New Roman","serif";
                                             mso-fareast-font-family:"Times New Roman";
                                             mso-fareast-theme-font:minor-fareast;}
                                            .MsoChpDefault
                                            {mso-style-type:export-only;
                                             mso-default-props:yes;
                                             font-size:10.0pt;
                                             mso-ansi-font-size:10.0pt;
                                             mso-bidi-font-size:10.0pt;
                                             mso-ascii-font-family:Calibri;
                                             mso-hansi-font-family:Calibri;
                                             mso-bidi-font-family:Calibri;}
                                            @page Section1
                                            {size:595.3pt 841.9pt;
                                             margin:2.0cm 42.5pt 2.0cm 3.0cm;
                                             mso-header-margin:35.4pt;
                                             mso-footer-margin:35.4pt;
                                             mso-paper-source:0;}
                                            div.Section1
                                            {page:Section1;}
                                            -->
                                        </style>
                                        <!--[if gte mso 10]>
                                        <style>
                                         /* Style Definitions */
                                         table.MsoNormalTable
                                                {mso-style-name:"Обычная таблица";
                                                mso-tstyle-rowband-size:0;
                                                mso-tstyle-colband-size:0;
                                                mso-style-noshow:yes;
                                                mso-style-priority:99;
                                                mso-style-qformat:yes;
                                                mso-style-parent:"";
                                                mso-padding-alt:0cm 5.4pt 0cm 5.4pt;
                                                mso-para-margin:0cm;
                                                mso-para-margin-bottom:.0001pt;
                                                mso-pagination:widow-orphan;
                                                font-size:10.0pt;
                                                font-family:"Calibri","sans-serif";}
                                        </style>
                                        <![endif]--><!--[if gte mso 9]><xml>
                                         <o:shapedefaults v:ext="edit" spidmax="4098"/>
                                        </xml><![endif]--><!--[if gte mso 9]><xml>
                                         <o:shapelayout v:ext="edit">
                                          <o:idmap v:ext="edit" data="1"/>
                                         </o:shapelayout></xml><![endif]-->
                                        </head>

                                        <body lang=RU link=blue vlink=purple style='tab-interval:35.4pt'>

                                            <div class=Section1>

                                                <p class=MsoHeader align=center style='text-align:center'><b style='mso-bidi-font-weight:
                                                                                                             normal'><i style='mso-bidi-font-style:normal'><span style='mso-no-proof:yes'><!--[if gte vml 1]><v:shapetype
                                                                                                              id="_x0000_t75" coordsize="21600,21600" o:spt="75" o:preferrelative="t"
                                                                                                              path="m@4@5l@4@11@9@11@9@5xe" filled="f" stroked="f">
                                                                                                              <v:stroke joinstyle="miter"/>
                                                                                                              <v:formulas>
                                                                                                               <v:f eqn="if lineDrawn pixelLineWidth 0"/>
                                                                                                               <v:f eqn="sum @0 1 0"/>
                                                                                                               <v:f eqn="sum 0 0 @1"/>
                                                                                                               <v:f eqn="prod @2 1 2"/>
                                                                                                               <v:f eqn="prod @3 21600 pixelWidth"/>
                                                                                                               <v:f eqn="prod @3 21600 pixelHeight"/>
                                                                                                               <v:f eqn="sum @0 0 1"/>
                                                                                                               <v:f eqn="prod @6 1 2"/>
                                                                                                               <v:f eqn="prod @7 21600 pixelWidth"/>
                                                                                                               <v:f eqn="sum @8 21600 0"/>
                                                                                                               <v:f eqn="prod @7 21600 pixelHeight"/>
                                                                                                               <v:f eqn="sum @10 21600 0"/>
                                                                                                              </v:formulas>
                                                                                                              <v:path o:extrusionok="f" gradientshapeok="t" o:connecttype="rect"/>
                                                                                                              <o:lock v:ext="edit" aspectratio="t"/>
                                                                                                             </v:shapetype><v:shape id="Рисунок_x0020_2" o:spid="_x0000_i1025" type="#_x0000_t75"
                                                                                                              alt="logo-lalipop-lady (1)" style='width:301.5pt;height:52.5pt;visibility:visible; 
                                                                                                              mso-wrap-style:square'>
                                                                                                              <v:imagedata src="<?=$logo?>" o:title="logo-lalipop-lady (1)"/>
                                                                                                             </v:shape><![endif]--><![if !vml]><img width=337 height=71 
                                                                                                       src="<?=$logo?>" alt="logo-lalipop-lady (1)"
                                                                                                       v:shapes="Рисунок_x0020_2"><![endif]></span><u><o:p></o:p></u></i></b></p> 

                                                <p class=MsoHeader align=center style='text-align:center'><b style='mso-bidi-font-weight:
                                                                                                             normal'><i style='mso-bidi-font-style:normal'><span style='font-size:16.0pt'><?=$title ?><o:p></o:p></span></i></b></p>

                                                <p class=MsoHeader style='text-align:justify'><b style='mso-bidi-font-weight:
                                                                                                 normal'><i style='mso-bidi-font-style:normal'><o:p>&nbsp;</o:p></i></b></p>

                                                <p class=MsoHeader style='text-align:justify'><span style='font-size:10.0pt;
                                                                                                    color:#595959;mso-themecolor:text1;mso-themetint:166'>Сайт: </span><span
                                                                                                    lang=EN-US style='font-size:10.0pt;color:#595959;mso-themecolor:text1;
                                                                                                    mso-themetint:166;mso-ansi-language:EN-US'><a href="<?=$site ?>"><span lang=EN-US style='color:#595959;mso-themecolor:
                                                                                            text1;mso-themetint:166;mso-ansi-language:EN-US'><?=$site ?></span></a></span><span
                                                        style='font-size:10.0pt;color:#595959;mso-themecolor:text1;mso-themetint:166'><span
                                                            style='mso-spacerun:yes'>      </span></span><span lang=EN-US style='font-size:
                                                        10.0pt;font-family:"Vrinda","sans-serif";color:#595959;mso-themecolor:text1;
                                                                                                           mso-themetint:166;mso-ansi-language:EN-US'>E</span><span style='font-size:10.0pt;
                                                        font-family:"Vrinda","sans-serif";color:#595959;mso-themecolor:text1;
                                                        mso-themetint:166'>-</span><span lang=EN-US style='font-size:10.0pt;font-family:
                                                        "Vrinda","sans-serif";color:#595959;mso-themecolor:text1;mso-themetint:166;
                                                        mso-ansi-language:EN-US'>mail</span><span style='font-size:10.0pt;font-family:
                                                        "Vrinda","sans-serif";color:#595959;mso-themecolor:text1;mso-themetint:166'>:</span><span
                                                        style='font-size:10.0pt;color:#595959;mso-themecolor:text1;mso-themetint:166'><a
                                                            href="mailto:<?=$email?>"><span lang=EN-US style='color:#595959;mso-themecolor:
                                                                                            text1;mso-themetint:166;mso-ansi-language:EN-US'><?=$email?></span></a><span
                                                            style='mso-spacerun:yes'>      </span>Телефоны: </span><span style='font-size:10.0pt;
                                                                                                    color:#595959;mso-themecolor:text1;mso-themetint:166'><?=$phone?></span></p>

                                                <p class=MsoHeader style='text-align:justify'><span style='font-size:10.0pt;
                                                                                                    mso-ascii-font-family:Calibri;mso-ascii-theme-font:minor-latin;mso-hansi-font-family:
                                                                                                    Calibri;mso-hansi-theme-font:minor-latin;color:#595959;mso-themecolor:text1;
                                                                                                    mso-themetint:166'><o:p>&nbsp;</o:p></span></p>

                                                <p class=MsoNormal align=center style='text-align:center;line-height:normal'><span
                                                        style='font-size:10.0pt;mso-bidi-font-family:Vrinda'><span
                                                            style='mso-spacerun:yes'>                                  </span><span
                                                            style='mso-spacerun:yes'>                                                             </span><b
                                                            style='mso-bidi-font-weight:normal'><span
                                                                style='mso-spacerun:yes'>                               </span><o:p></o:p></b></span></p>

                                                <table class=MsoNormalTable border=1 cellspacing=0 cellpadding=0
                                                       style='margin-left:-35.4pt;border-collapse:collapse;border:none;mso-border-alt:
                                                       solid windowtext .5pt;mso-yfti-tbllook:1184;mso-padding-alt:0cm 5.4pt 0cm 5.4pt;
                                                       mso-border-insideh:.5pt solid windowtext;mso-border-insidev:.5pt solid windowtext'>
                                                    <tr style='mso-yfti-irow:0;mso-yfti-firstrow:yes;height:21.1pt'>
                                                        <td width=122  valign=middle style='width:91.3pt;border:solid windowtext 1.0pt;mso-border-alt:
                                                            solid windowtext .5pt;padding:0cm 5.4pt 0cm 5.4pt;height:21.1pt'>
                                                            <p class=MsoNormal style='text-align:justify'><b style='mso-bidi-font-weight:
                                                                                                             normal'><span style='font-size:12.0pt;line-height:115%;mso-bidi-font-family:
                                                                        Vrinda'>Номер заказа<o:p></o:p></span></b></p>
                                                        </td>
                                                        <td width=226  valign=middle style='width:169.25pt;border:solid windowtext 1.0pt;border-left:
                                                            none;mso-border-left-alt:solid windowtext .5pt;mso-border-alt:solid windowtext .5pt;
                                                            padding:0cm 5.4pt 0cm 5.4pt;height:21.1pt'>
                                                            <p class=MsoNormal><b style='mso-bidi-font-weight:normal'><span
                                                                        style='font-size:12.0pt;line-height:115%;mso-bidi-font-family:Vrinda'><?=$order->id ?><o:p></o:p></span></b></p>
                                                        </td>
                                                    </tr>
                                                    <tr style='mso-yfti-irow:1;height:18.75pt'>
                                                        <td width=122  valign=middle style='width:91.3pt;border:solid windowtext 1.0pt;border-top:
                                                            none;mso-border-top-alt:solid windowtext .5pt;mso-border-alt:solid windowtext .5pt;
                                                            padding:0cm 5.4pt 0cm 5.4pt;height:18.75pt'>
                                                            <p class=MsoNormal style='text-align:justify'><b style='mso-bidi-font-weight:
                                                                                                             normal'><span style='font-size:10.0pt;line-height:115%;mso-bidi-font-family:
                                                                        Vrinda'>Дата<o:p></o:p></span></b></p>
                                                        </td>
                                                        <td width=226  valign=middle style='width:169.25pt;border-top:none;border-left:none;
                                                            border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
                                                            mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
                                                            mso-border-alt:solid windowtext .5pt;padding:0cm 5.4pt 0cm 5.4pt;height:18.75pt'>
                                                            <p class=MsoNormal><span style='font-size:10.0pt;line-height:115%;mso-bidi-font-family:
                                                                                     Vrinda'><?=date('d.m.Y H:i', strtotime($order->created)) ?><o:p></o:p></span></p>
                                                        </td>
                                                    </tr>
                                                    <tr style='mso-yfti-irow:2;height:6.0pt'>
                                                        <td width=122  valign=middle style='width:91.3pt;border:solid windowtext 1.0pt;border-top:
                                                            none;mso-border-top-alt:solid windowtext .5pt;mso-border-alt:solid windowtext .5pt;
                                                            padding:0cm 5.4pt 0cm 5.4pt;height:6.0pt'>
                                                            <p class=MsoNormal style='text-align:justify'><b style='mso-bidi-font-weight:
                                                                                                             normal'><span style='font-size:10.0pt;line-height:115%;mso-bidi-font-family:
                                                                        Vrinda'>ФИО<o:p></o:p></span></b></p>
                                                        </td>
                                                        <td width=226  valign=middle style='width:169.25pt;border-top:none;border-left:none;
                                                            border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
                                                            mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
                                                            mso-border-alt:solid windowtext .5pt;padding:0cm 5.4pt 0cm 5.4pt;height:6.0pt'>
                                                            <p class=MsoNormal><span style='font-size:10.0pt;line-height:115%;mso-bidi-font-family:
                                                                                     Vrinda'><?=$order->fio ?><o:p></o:p></span></p>
                                                        </td>
                                                    </tr>
                                                    <tr style='mso-yfti-irow:3;height:18.75pt'>
                                                        <td width=122  valign=middle style='width:91.3pt;border:solid windowtext 1.0pt;border-top:
                                                            none;mso-border-top-alt:solid windowtext .5pt;mso-border-alt:solid windowtext .5pt;
                                                            padding:0cm 5.4pt 0cm 5.4pt;height:18.75pt'>
                                                            <p class=MsoNormal style='text-align:justify'><b style='mso-bidi-font-weight:
                                                                                                             normal'><span style='font-size:10.0pt;line-height:115%;mso-bidi-font-family:
                                                                        Vrinda'>Телефон<o:p></o:p></span></b></p>
                                                        </td>
                                                        <td width=226  valign=middle style='width:169.25pt;border-top:none;border-left:none;
                                                            border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
                                                            mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
                                                            mso-border-alt:solid windowtext .5pt;padding:0cm 5.4pt 0cm 5.4pt;height:18.75pt'>
                                                            <p class=MsoNormal><span style='font-size:10.0pt;line-height:115%;mso-bidi-font-family:
                                                                                     Vrinda'><?=$order->phone ?><o:p></o:p></span></p>
                                                        </td>
                                                    </tr>
                                                    <tr style='mso-yfti-irow:4;height:20.25pt'>
                                                        <td width=122  valign=middle style='width:91.3pt;border:solid windowtext 1.0pt;border-top:
                                                            none;mso-border-top-alt:solid windowtext .5pt;mso-border-alt:solid windowtext .5pt;
                                                            padding:0cm 5.4pt 0cm 5.4pt;height:20.25pt'>
                                                            <p class=MsoNormal style='text-align:justify'><b style='mso-bidi-font-weight:
                                                                                                             normal'><span style='font-size:10.0pt;line-height:115%;mso-bidi-font-family:
                                                                        Vrinda'>Город<o:p></o:p></span></b></p>
                                                        </td>
                                                        <td width=226  valign=middle style='width:169.25pt;border-top:none;border-left:none;
                                                            border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
                                                            mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
                                                            mso-border-alt:solid windowtext .5pt;padding:0cm 5.4pt 0cm 5.4pt;height:20.25pt'>
                                                            <p class=MsoNormal><span style='font-size:10.0pt;line-height:115%;mso-bidi-font-family:
                                                                                     Vrinda'><?= $order->city_index . ' ' . $order->city ?><o:p></o:p></span></p>
                                                        </td>
                                                    </tr>
                                                    <tr style='mso-yfti-irow:5;height:21.75pt'>
                                                        <td width=122  valign=middle style='width:91.3pt;border:solid windowtext 1.0pt;border-top:
                                                            none;mso-border-top-alt:solid windowtext .5pt;mso-border-alt:solid windowtext .5pt;
                                                            padding:0cm 5.4pt 0cm 5.4pt;height:21.75pt'>
                                                            <p class=MsoNormal style='text-align:justify'><b style='mso-bidi-font-weight:
                                                                                                             normal'><span style='font-size:10.0pt;line-height:115%;mso-bidi-font-family:
                                                                        Vrinda'>E-mail<o:p></o:p></span></b></p>
                                                        </td>
                                                        <td width=226  valign=middle style='width:169.25pt;border-top:none;border-left:none;
                                                            border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
                                                            mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
                                                            mso-border-alt:solid windowtext .5pt;padding:0cm 5.4pt 0cm 5.4pt;height:21.75pt'>
                                                            <p class=MsoNormal><span style='font-size:10.0pt;line-height:115%;mso-bidi-font-family:
                                                                                     Vrinda'><?=$order->email ?><o:p></o:p></span></p>
                                                        </td>
                                                    </tr>
                                                    <tr style='mso-yfti-irow:6;height:27.95pt'>
                                                        <td width=122 valign=middle style='width:91.3pt;border:solid windowtext 1.0pt;
                                                            border-top:none;mso-border-top-alt:solid windowtext .5pt;mso-border-alt:solid windowtext .5pt;
                                                            padding:0cm 5.4pt 0cm 5.4pt;height:27.95pt'>
                                                            <p class=MsoNormal style='text-align:justify'><b style='mso-bidi-font-weight:
                                                                                                             normal'><span style='font-size:10.0pt;line-height:115%;mso-bidi-font-family:
                                                                        Vrinda'>Адрес доставки<o:p></o:p></span></b></p>
                                                        </td>
                                                        <td width=226 valign=middle style='width:169.25pt;border-top:none;border-left:
                                                            none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
                                                            mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
                                                            mso-border-alt:solid windowtext .5pt;padding:0cm 5.4pt 0cm 5.4pt;height:27.95pt'>
                                                            <p class=MsoNormal><span style='font-size:10.0pt;line-height:115%;mso-bidi-font-family:
                                                                                     Vrinda'><?= stripslashes($order->adress) ?><o:p></o:p></span></p>
                                                        </td>
                                                    </tr>
                                                </table>

                                                <p class=MsoNormal><b style='mso-bidi-font-weight:normal'><span
                                                            style='font-size:10.0pt;line-height:115%;mso-bidi-font-family:Vrinda'><o:p>&nbsp;</o:p></span></b></p>

                                                <table class=MsoNormalTable border=1 cellspacing=0 cellpadding=0 width=688
                                                       style='width:516.0pt;margin-left:-36.15pt;border-collapse:collapse;border:
                                                       none;mso-border-alt:dotted windowtext .5pt;mso-yfti-tbllook:1184;mso-padding-alt:
                                                       0cm 5.4pt 0cm 5.4pt;mso-border-insideh:.5pt dotted windowtext;mso-border-insidev:
                                                       .5pt dotted windowtext'>
                                                    <tr style='mso-yfti-irow:0;mso-yfti-firstrow:yes;height:15.75pt'>
                                                        <td style='border:solid windowtext 1.0pt;mso-border-alt:solid windowtext .5pt;
                                                            padding:0cm 5.4pt 0cm 5.4pt;height:15.75pt'>
                                                            <p class=MsoNormal><b style='mso-bidi-font-weight:normal'><span
                                                                        style='font-size:10.0pt;line-height:115%;mso-bidi-font-family:Vrinda'>№<o:p></o:p></span></b></p>
                                                        </td>
                                                        <td style='border:solid windowtext 1.0pt;border-left:none;mso-border-left-alt:
                                                            solid windowtext .5pt;mso-border-alt:solid windowtext .5pt;padding:0cm 5.4pt 0cm 5.4pt;
                                                            height:15.75pt'>
                                                            <p class=MsoNormal><b style='mso-bidi-font-weight:normal'><span
                                                                        style='font-size:10.0pt;line-height:115%;mso-bidi-font-family:Vrinda'>Артикул<o:p></o:p></span></b></p>
                                                        </td>
                                                        <td style='border:solid windowtext 1.0pt;border-left:none;mso-border-left-alt:
                                                            solid windowtext .5pt;mso-border-alt:solid windowtext .5pt;padding:0cm 5.4pt 0cm 5.4pt;
                                                            height:15.75pt'>
                                                            <p class=MsoNormal><b style='mso-bidi-font-weight:normal'><span
                                                                        style='font-size:10.0pt;line-height:115%;mso-bidi-font-family:Vrinda'>Наименование<o:p></o:p></span></b></p>
                                                        </td>
                                                        <td style='border:solid windowtext 1.0pt;border-left:none;mso-border-left-alt:
                                                            solid windowtext .5pt;mso-border-alt:solid windowtext .5pt;padding:0cm 5.4pt 0cm 5.4pt;
                                                            height:15.75pt'>
                                                            <p class=MsoNormal><b style='mso-bidi-font-weight:normal'><span
                                                                        style='font-size:10.0pt;line-height:115%;mso-bidi-font-family:Vrinda'>Размер<o:p></o:p></span></b></p>
                                                        </td>
                                                        <td style='border:solid windowtext 1.0pt;border-left:none;mso-border-left-alt:
                                                            solid windowtext .5pt;mso-border-alt:solid windowtext .5pt;padding:0cm 5.4pt 0cm 5.4pt;
                                                            height:15.75pt'>
                                                            <p class=MsoNormal><b style='mso-bidi-font-weight:normal'><span
                                                                        style='font-size:10.0pt;line-height:115%;mso-bidi-font-family:Vrinda'>Цена за
                                                                        шт.<o:p></o:p></span></b></p>
                                                        </td>
                                                        <td style='border:solid windowtext 1.0pt;border-left:none;mso-border-left-alt:
                                                            solid windowtext .5pt;mso-border-alt:solid windowtext .5pt;padding:0cm 5.4pt 0cm 5.4pt;
                                                            height:15.75pt'>
                                                            <p class=MsoNormal><b style='mso-bidi-font-weight:normal'><span
                                                                        style='font-size:10.0pt;line-height:115%;mso-bidi-font-family:Vrinda'>Кол-во<o:p></o:p></span></b></p>
                                                        </td>
                                                        <td style='border:solid windowtext 1.0pt;border-left:none;mso-border-left-alt:
                                                            solid windowtext .5pt;mso-border-alt:solid windowtext .5pt;padding:0cm 5.4pt 0cm 5.4pt;
                                                            height:15.75pt'>
                                                            <p class=MsoNormal><b style='mso-bidi-font-weight:normal'><span
                                                                        style='font-size:10.0pt;line-height:115%;mso-bidi-font-family:Vrinda'>Скидка<o:p></o:p></span></b></p>
                                                        </td>
                                                        <td style='border:solid windowtext 1.0pt;border-left:none;mso-border-left-alt:
                                                            solid windowtext .5pt;mso-border-alt:solid windowtext .5pt;padding:0cm 5.4pt 0cm 5.4pt;
                                                            height:15.75pt'>
                                                            <p class=MsoNormal style='margin-left:.6pt'><b style='mso-bidi-font-weight:
                                                                                                           normal'><span style='font-size:10.0pt;line-height:115%;mso-bidi-font-family:
                                                                        Vrinda'>Сумма<o:p></o:p></span></b></p>
                                                        </td>
                                                    </tr>
                                                    
                                                    
                                                    
                                                    
                                                    
                                                      <?php foreach ($products as $key => $value) {
 ?>              
                                                    
                                                    
                                                    
                                                    <tr style='mso-yfti-irow:1'>
                                                        <td style='border:solid windowtext 1.0pt;border-top:none;mso-border-top-alt:
                                                            solid windowtext .5pt;mso-border-alt:solid windowtext .5pt;padding:0cm 5.4pt 0cm 5.4pt'>
                                                            <p class=MsoNormal align=center style='margin-bottom:0cm;margin-bottom:.0001pt;
                                                               text-align:center'><b style='mso-bidi-font-weight:normal'><span
                                                                        style='font-size:10.0pt;line-height:115%;mso-fareast-font-family:"Times New Roman";
                                                                        mso-bidi-font-family:Vrinda'><?php echo ($key + 1) ?><span style='mso-spacerun:yes'>         </span></span></b><span
                                                                    style='font-size:10.0pt;line-height:115%;mso-fareast-font-family:"Times New Roman"'><o:p></o:p></span></p>
                                                        </td>
                                                        <td style='border-top:none;border-left:none;border-bottom:solid windowtext 1.0pt;
                                                            border-right:solid windowtext 1.0pt;mso-border-top-alt:solid windowtext .5pt;
                                                            mso-border-left-alt:solid windowtext .5pt;mso-border-alt:solid windowtext .5pt;
                                                            padding:0cm 5.4pt 0cm 5.4pt'>
                                                            <p class=MsoNormal align=center style='margin-bottom:0cm;margin-bottom:.0001pt;
                                                               text-align:center'><span style='font-size:10.0pt;line-height:115%;mso-fareast-font-family:
                                                                    "Times New Roman"'><?php echo stripslashes($value->article) ?><span style='mso-spacerun:yes'>                </span><o:p></o:p></span></p>
                                                        </td>
                                                        <td style='border-top:none;border-left:none;border-bottom:solid windowtext 1.0pt;
                                                            border-right:solid windowtext 1.0pt;mso-border-top-alt:solid windowtext .5pt;
                                                            mso-border-left-alt:solid windowtext .5pt;mso-border-alt:solid windowtext .5pt;
                                                            padding:0cm 5.4pt 0cm 5.4pt'>
                                                            <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt'><span
                                                                    style='font-size:10.0pt;line-height:115%;mso-fareast-font-family:"Times New Roman"'><span
                                                                        style='mso-spacerun:yes'> </span><?php echo stripslashes($value->name) ?> <span
                                                                        style='mso-tab-count:1'>           </span><span
                                                                        style='mso-spacerun:yes'> </span><o:p></o:p></span></p>
                                                        </td>
                                                        <td style='border-top:none;border-left:none;border-bottom:solid windowtext 1.0pt;
                                                            border-right:solid windowtext 1.0pt;mso-border-top-alt:solid windowtext .5pt;
                                                            mso-border-left-alt:solid windowtext .5pt;mso-border-alt:solid windowtext .5pt;
                                                            padding:0cm 5.4pt 0cm 5.4pt'>
                                                            <p class=MsoNormal align=center style='margin-bottom:0cm;margin-bottom:.0001pt;
                                                               text-align:center'><span style='font-size:10.0pt;line-height:115%;mso-fareast-font-family:
                                                                    "Times New Roman"'><?php echo stripslashes($value->char_1_name) ?><span
                                                                        style='mso-tab-count:1'>      </span> <o:p></o:p></span></p>
                                                        </td>
                                                        <td style='border-top:none;border-left:none;border-bottom:solid windowtext 1.0pt;
                                                            border-right:solid windowtext 1.0pt;mso-border-top-alt:solid windowtext .5pt;
                                                            mso-border-left-alt:solid windowtext .5pt;mso-border-alt:solid windowtext .5pt;
                                                            padding:0cm 5.4pt 0cm 5.4pt'>
                                                            <p class=MsoNormal align=center style='margin-bottom:0cm;margin-bottom:.0001pt;
                                                               text-align:center'><span style='font-size:10.0pt;line-height:115%;mso-fareast-font-family:
                                                                    "Times New Roman"'><?php echo str_replace(",", " ", number_format($value->price, 0, '', ' ')) ?> <o:p></o:p></span></p>
                                                        </td>
                                                        <td style='border-top:none;border-left:none;border-bottom:solid windowtext 1.0pt;
                                                            border-right:solid windowtext 1.0pt;mso-border-top-alt:solid windowtext .5pt;
                                                            mso-border-left-alt:solid windowtext .5pt;mso-border-alt:solid windowtext .5pt;
                                                            padding:0cm 5.4pt 0cm 5.4pt'>
                                                            <p class=MsoNormal align=center style='margin-bottom:0cm;margin-bottom:.0001pt;
                                                               text-align:center'><span style='font-size:10.0pt;line-height:115%;mso-fareast-font-family:
                                                                    "Times New Roman"'><?php echo $value->count ?> <o:p></o:p></span></p>
                                                        </td>
                                                        <td style='border-top:none;border-left:none;border-bottom:solid windowtext 1.0pt;
                                                            border-right:solid windowtext 1.0pt;mso-border-top-alt:solid windowtext .5pt;
                                                            mso-border-left-alt:solid windowtext .5pt;mso-border-alt:solid windowtext .5pt;
                                                            padding:0cm 5.4pt 0cm 5.4pt'>
                                                            <p class=MsoNormal align=center style='margin-bottom:0cm;margin-bottom:.0001pt;
                                                               text-align:center'><span style='font-size:10.0pt;line-height:115%;mso-fareast-font-family:
                                                                    "Times New Roman"'><?php echo $order->discount_procent ?>% <o:p></o:p></span></p>
                                                        </td>
                                                        <td style='border-top:none;border-left:none;border-bottom:solid windowtext 1.0pt;
                                                            border-right:solid windowtext 1.0pt;mso-border-top-alt:solid windowtext .5pt;
                                                            mso-border-left-alt:solid windowtext .5pt;mso-border-alt:solid windowtext .5pt;
                                                            padding:0cm 5.4pt 0cm 5.4pt'>
                                                            <p class=MsoNormal align=center style='margin-bottom:0cm;margin-bottom:.0001pt;
                                                               text-align:center'><span style='font-size:10.0pt;line-height:115%;mso-fareast-font-family:
                                                                    "Times New Roman"'>  <?php
      if ($order->discount_procent > 0) {
          echo str_replace(",", " ", number_format($value->sum * (1-$order->discount_procent/100), 0, '', ' '));
      }
      else {
      echo str_replace(",", " ", number_format($value->sum, 0, '', ' '));
            }  
              ?> <o:p></o:p></span></p>
                                                        </td>
                                                    </tr>
                                                    
                                                 <?php } ?>         
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    <tr style='mso-yfti-irow:3;height:23.25pt'>
                                                        <td width=688 colspan=8 style='width:516.0pt;border:solid windowtext 1.0pt;
                                                            border-top:none;mso-border-top-alt:solid windowtext .5pt;mso-border-alt:solid windowtext .5pt;
                                                            padding:0cm 5.4pt 0cm 5.4pt;height:23.25pt'>
                                                            <p class=MsoNormal style='margin-left:41.55pt'><b style='mso-bidi-font-weight:
                                                                                                              normal'><span style='font-size:10.0pt;line-height:115%;mso-bidi-font-family:
                                                                        Vrinda'><span
                                                                            style='mso-spacerun:yes'>                                                                                      
                                                                        </span>ИТОГО:<span style='mso-spacerun:yes'>                       </span><span
                                                                            style='mso-spacerun:yes'>           </span><?php echo str_replace(",", " ", number_format($order->sum_discount, 0, '', ' ')) . " руб." . (($order->discount_procent > 0) ? " (с учетом скидки ".$order->discount_procent."%) " : null) . (($order->discount_sum > 0) ? " (с учетом скидки ".$order->discount_sum." руб.) " : null) ?> <o:p></o:p></span></b></p>
                                                        </td>
                                                    </tr>
                                                    <tr style='mso-yfti-irow:4;height:28.5pt'>
                                                        <td width=688 colspan=8 style='width:516.0pt;border:solid windowtext 1.0pt;
                                                            border-top:none;mso-border-top-alt:solid windowtext .5pt;mso-border-alt:solid windowtext .5pt;
                                                            padding:0cm 5.4pt 0cm 5.4pt;height:28.5pt'>
                                                            <p class=MsoNormal><b style='mso-bidi-font-weight:normal'><span
                                                                        style='font-size:10.0pt;line-height:115%'><span
                                                                            style='mso-spacerun:yes'>                                     
                                                                        </span>Доставка, почтовый тариф, сервисный сбор<span
                                                                            style='mso-spacerun:yes'>                               </span>
                                                                        <?php echo str_replace(",", " ", number_format($order->delivery_price, 0, '', ' ')) . " руб." ?><span
                                                                            style='mso-spacerun:yes'>                                     </span><?php echo str_replace(",", " ", number_format($order->delivery_price, 0, '', ' ')) . " руб." ?></span></b><b style='mso-bidi-font-weight:
                                                                                                                    normal'><span style='font-size:10.0pt;line-height:115%;mso-bidi-font-family:
                                                                        Vrinda'><o:p></o:p></span></b></p>
                                                        </td>
                                                    </tr>
                                                    <tr style='mso-yfti-irow:5;mso-yfti-lastrow:yes;height:27.0pt'>
                                                        <td width=688 colspan=8 style='width:516.0pt;border:solid windowtext 1.0pt;
                                                            border-top:none;mso-border-top-alt:solid windowtext .5pt;mso-border-alt:solid windowtext .5pt;
                                                            padding:0cm 5.4pt 0cm 5.4pt;height:27.0pt'>
                                                            <p class=MsoNormal style='margin-left:41.55pt;line-height:normal'><b
                                                                    style='mso-bidi-font-weight:normal'><span style='font-size:10.0pt'><span
                                                                            style='mso-spacerun:yes'>                               </span><span
                                                                            style='mso-spacerun:yes'>                                                         </span>ИТОГО:<span
                                                                            style='mso-spacerun:yes'>                                 </span><?php echo str_replace(",", " ", number_format(($order->sum_total), 0, '', ' ')) . " руб." ?><o:p></o:p></span></b></p>
                                                        </td>
                                                    </tr>
                                                </table>

                                                <p class=MsoNormal><o:p>&nbsp;</o:p></p>

                                                <p class=MsoNormal><o:p>&nbsp;</o:p></p>

                                                <p class=MsoNormal><o:p>&nbsp;</o:p></p>

                                            </div>

                                        </body>

                                        </html>




                                        <?php
                                        $output = ob_get_contents();
                                        ;
                                        ob_end_clean();
                                        $time = mktime();
                                        if (file_exists($registry->base_dir . 'files/blank.doc')) {
                                            unlink($registry->base_dir . 'files/blank.doc');
                                        }
                                        $fp = fopen($registry->base_dir . 'files/blank_' . $time . '.doc', "w");

                                        fwrite($fp, iconv("utf-8", "cp1251", $output));
                                        fclose($fp);
                                        header("Location: " . $registry->base_url . 'files/blank_' . $time . '.doc');
                                        exit();
                                        