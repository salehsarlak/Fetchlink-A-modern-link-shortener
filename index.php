<!DOCTYPE html>
<html lang="en" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>link</title>
    <link rel="stylesheet" href="./css/reset.css">
    <link rel="stylesheet" href="./css/style.css">
</head>


<?php 

require "config/db.php";


$endpointlink_redirect = null;
$create_type = true;
if(isset($_GET["url"])){
    $create_type = false;

    $custom = "http://localhost/link?url=" . $_GET["url"];

    $stmt = $conn->prepare("SELECT * FROM links WHERE custom_link = ? ");
    $stmt ->bind_param("s" , $custom);

    $stmt->execute();

    $result = $stmt->get_result();

$endpointlink_redirect = $result->fetch_assoc();

    if($endpointlink_redirect["type"] == "direct"){

    header("location:" . $endpointlink_redirect["endpoint_link"]);


    }  

$endpointlink_redirect = $endpointlink_redirect["endpoint_link"];


} 
    

$created = false;
$exists = false;


if(isset($_POST["submit"])){

    $custom = $_POST["custom_link"];
    $endpoint = $_POST["endpoint_link"];
    $type = $_POST["type"];

    $stmt = $conn->prepare("SELECT * FROM links WHERE custom_link = ? ");

    $stmt->bind_param("s" , $custom);

    $stmt->execute();

    $exists = true;

    $result = $stmt->get_result();


        if($result->num_rows == 0){

        $created = true;
            
        $stmt = $conn ->prepare("INSERT INTO links (custom_link , endpoint_link , type) VALUES (? , ? , ?)");

        $stmt->bind_param("sss" , $custom , $endpoint , $type);

        $stmt ->execute();

        $result = $stmt->get_result();

        

        }

}





?>
        
<body>
    
<?php
    
    if($create_type == true){
    
   

?><!-- ============ Header ========== -->
    <header class="main-header">
        <div class="header-content">
            <h2 class="title">fetch<span>link</span></h2>
            <ul class="menu">
                <li class="item"><a class="null" href="#">فچ لینک</a></li>
                <li class="item"><a class="null" href="#call">درباره من</a></li>
            </ul>
            <div class="user"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#878787" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-circle-user"><circle cx="12" cy="12" r="10"/><circle cx="12" cy="10" r="3"/><path d="M7 20.662V19a2 2 0 0 1 2-2h6a2 2 0 0 1 2 2v1.662"/></svg>        </div>
</div>
    </header>
      <?php if(isset($_POST["submit"]) && $created ){
                                                    
                                                ?>
                                                <div class="not">
                            <p class="notp">لینک شما:</p>
                            <a target="blank" class="sa" href="<?= htmlspecialchars($custom) ?>">
                                <?= htmlspecialchars($custom) ?>
                                </a>
                        </div><?php
                         } elseif($exists){
                            ?>
                            <div class="not"><p class="sa">این لینک از قبل وجود دارد !</p></div><?php
                         }

                         ?>                  
</div>  
        <div class="main">

        <div class="main-content">
<h2 class="mtitle">لینک های بلند رو<span class="mspapn">کوتاه کن !</span></h2><p class="para">با کوتاه کننده ی لینک ما، لینک های طولانی رو در چند ثانیه کوتاه، مدیریت و با دیگران به اشتراک بزار</p>
                <div class="link">
                    <div class="btns">
                        <a class="btn">امن و مطمئن <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#ffffff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-lock-open"><rect width="18" height="11" x="3" y="11" rx="2" ry="2"/><path d="M7 11V7a5 5 0 0 1 9.9-1"/></svg></a>
                        <a class="btn">سریع و ساده<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#172343" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-zap"><path d="M15.914 4a1.5 1.5 0 00-2.474-1.561l-9 9A1.5 1.5 0 005.5 14h4.002a.5.5 0 01.471.666L8.086 20a1.5 1.5 0 002.475 1.56l9-9A1.5 1.5 0 0018.5 10h-3.997a.5.5 0 01-.472-.667z"/></svg></a>
                    </div>
                    <div class="linkform">
                        <form method="POST" action="">

                            <div class="fd">
                                <div class="link-icon"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#808BA1" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-link"><path d="M10 13a5 5 0 0 0 7.54.54l3-3a5 5 0 0 0-7.07-7.07l-1.72 1.71"/><path d="M14 11a5 5 0 0 0-7.54-.54l-3 3a5 5 0 0 0 7.07 7.07l1.71-1.71"/></svg></div>
                                <input id="link" name="endpoint_link" placeholder="لینک مور نظر را وارد" type="url">
                                <input id="custom_link" name="custom_link" value="http://localhost/link?url=" placeholder="لینک مور نظر را وارد" type="url">
                                <button type="submit" name="submit" id="submit" >کوتاه کن<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="#ffffff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-blend"><circle cx="15" cy="9" r="7"/><circle cx="9" cy="15" r="7"/></svg></button>
                            </div>
                            <div class="fd">
<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#4148F0" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-arrow-big-down"><path d="M9 5a1 1 0 0 1 1-1h4a1 1 0 0 1 1 1v6a1 1 0 0 0 1 1h3.293a.707.707 0 0 1 .5 1.207l-7.086 7.086a1 1 0 0 1-1.414 0l-7.086-7.086a.707.707 0 0 1 .5-1.207H8a1 1 0 0 0 1-1z"/></svg>
<select class="type" name="type" id="type">
                                    <option value="direct" class="opt">لینک مستـقیم</option>
                                    <option value="indirect" class="opt">لینک غیر مستـقیم</option>
                                </select>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
<?php
 } else{

?>
        <div class="main2">

    
            <div class="advans">

                <img src="./assets/imagees/ads/oszzg3de.gif" alt="tab" class="tab">
                <img src="./assets/imagees/ads/1rpwh21t.gif" alt="tab" class="tab">
                <img src="./assets/imagees/ads/ymr53h20.gif" alt="tab" class="tab">
                <img src="./assets/imagees/ads/cdkvish5.gif" alt="tab" class="tab">



            </div>

            <div class="button">
                <a target="blank" href="<?php echo htmlspecialchars($endpointlink_redirect); ?>" class="go">رفتن به لینک</a>
            </div>
              <?php  }?>
        </div>
           
        <div class="main3">
            <div class="card">
                <img class="card-pfp" src="./assets/imagees/prof.png" alt="Saleh Sarlak">
                <div class="info">
                    <div class="title"><h4>Saleh <span class="htitle">Sarlak</span></h4></div>
                    <div class="title"><p>I bild modern web experiences with clean code, creative solutions, and a passion for technology.</p></div>
                    
                    <div class="icons">
    <a target="blank" href="https://github.com/salehsarlak"><svg class="git" width="40" height="39" viewBox="0 0 40 39" fill="none" xmlns="http://www.w3.org/2000/svg">
<path fill-rule="evenodd" clip-rule="evenodd" d="M19.8683 0C15.15 0.00244809 10.5863 1.6736 6.99341 4.71464C3.4005 7.75568 1.01263 11.9683 0.25677 16.5993C-0.499089 21.2302 0.426344 25.9775 2.86761 29.9922C5.30888 34.007 9.10677 37.0274 13.5822 38.5135C14.5695 38.6967 14.9415 38.0848 14.9415 37.5645C14.9415 37.0441 14.9217 35.5355 14.9151 33.8862C9.38595 35.0807 8.21759 31.553 8.21759 31.553C7.31581 29.2623 6.0125 28.6601 6.0125 28.6601C4.20894 27.4362 6.14745 27.4591 6.14745 27.4591C8.14519 27.5999 9.19508 29.4979 9.19508 29.4979C10.9657 32.5183 13.8455 31.6446 14.9776 31.1341C15.1554 29.8546 15.6721 28.9841 16.2415 28.49C11.8247 27.9925 7.18416 26.2974 7.18416 18.725C7.15678 16.7611 7.88971 14.8619 9.23128 13.4203C9.02722 12.9229 8.34594 10.9136 9.42544 8.1844C9.42544 8.1844 11.0941 7.65427 14.8921 10.2101C18.1498 9.32424 21.5869 9.32424 24.8446 10.2101C28.6393 7.65427 30.3046 8.1844 30.3046 8.1844C31.3874 10.9071 30.7062 12.9164 30.5021 13.4203C31.8479 14.8621 32.5824 16.7646 32.5525 18.7315C32.5525 26.3203 27.9021 27.9925 23.4787 28.4801C24.1896 29.0954 24.8248 30.2964 24.8248 32.142C24.8248 34.7862 24.8018 36.9132 24.8018 37.5645C24.8018 38.0913 25.1605 38.7066 26.1676 38.5135C30.6436 37.0273 34.4419 34.0063 36.8831 29.9908C39.3243 25.9754 40.2493 21.2274 39.4925 16.596C38.7358 11.9647 36.3468 7.75199 32.7527 4.71147C29.1586 1.67095 24.5938 0.00089637 19.8749 0H19.8683Z" fill="#191717"/>
</svg></a>

<a id="call" target="blank" href="https://instagram.com/ixxsaleh"><svg width="40" height="40" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
<g clip-path="url(#clip0_5_304)">
<path d="M20 3.6046C25.3434 3.6046 25.9706 3.62842 28.0826 3.7237C30.0358 3.81104 31.0917 4.13656 31.7984 4.41445C32.7352 4.77967 33.4022 5.20842 34.1009 5.90711C34.7995 6.6058 35.2362 7.27273 35.5935 8.20961C35.8635 8.91624 36.1969 9.97221 36.2843 11.9254C36.3795 14.0373 36.4034 14.6645 36.4034 20.0079C36.4034 25.3513 36.3795 25.9786 36.2843 28.0905C36.1969 30.0437 35.8714 31.0996 35.5935 31.8063C35.2283 32.7432 34.7995 33.4101 34.1009 34.1088C33.4022 34.8075 32.7352 35.2441 31.7984 35.6014C31.0917 35.8714 30.0358 36.2048 28.0826 36.2922C25.9706 36.3875 25.3434 36.4113 20 36.4113C14.6566 36.4113 14.0294 36.3875 11.9174 36.2922C9.96428 36.2048 8.9083 35.8793 8.20167 35.6014C7.26479 35.2362 6.59786 34.8075 5.89917 34.1088C5.20048 33.4101 4.7638 32.7432 4.40651 31.8063C4.13657 31.0996 3.8031 30.0437 3.71576 28.0905C3.62049 25.9786 3.59667 25.3513 3.59667 20.0079C3.59667 14.6645 3.62049 14.0373 3.71576 11.9254C3.8031 9.97221 4.12863 8.91624 4.40651 8.20961C4.77174 7.27273 5.20048 6.6058 5.89917 5.90711C6.59786 5.20842 7.26479 4.77173 8.20167 4.41445C8.9083 4.1445 9.96428 3.81104 11.9174 3.7237C14.0294 3.62048 14.6646 3.6046 20 3.6046ZM20 0C14.5693 0 13.8865 0.023819 11.7507 0.119095C9.62287 0.214371 8.16991 0.555776 6.89957 1.04803C5.58158 1.55617 4.47003 2.24692 3.35848 3.35848C2.24692 4.47003 1.56411 5.58952 1.04804 6.89956C0.555776 8.16991 0.214371 9.62287 0.119095 11.7586C0.023819 13.8865 0 14.5693 0 20C0 25.4307 0.023819 26.1135 0.119095 28.2493C0.214371 30.3771 0.555776 31.8301 1.04804 33.1084C1.55617 34.4264 2.24692 35.5379 3.35848 36.6495C4.47003 37.761 5.58952 38.4438 6.89957 38.9599C8.16991 39.4522 9.62287 39.7936 11.7586 39.8888C13.8944 39.9841 14.5693 40.0079 20.008 40.0079C25.4466 40.0079 26.1215 39.9841 28.2573 39.8888C30.3851 39.7936 31.8381 39.4522 33.1163 38.9599C34.4343 38.4518 35.5459 37.761 36.6574 36.6495C37.769 35.5379 38.4518 34.4184 38.9679 33.1084C39.4601 31.838 39.8015 30.3851 39.8968 28.2493C39.9921 26.1135 40.0159 25.4387 40.0159 20C40.0159 14.5613 39.9921 13.8865 39.8968 11.7507C39.8015 9.62287 39.4601 8.16991 38.9679 6.89162C38.4597 5.57364 37.769 4.46209 36.6574 3.35054C35.5459 2.23898 34.4264 1.55617 33.1163 1.0401C31.846 0.547836 30.393 0.206431 28.2573 0.111155C26.1136 0.023819 25.4307 0 20 0Z" fill="url(#paint0_linear_5_304)"/>
<path d="M20 9.73402C14.3311 9.73402 9.72607 14.3311 9.72607 20.0079C9.72607 25.6848 14.3231 30.2818 20 30.2818C25.6768 30.2818 30.2739 25.6848 30.2739 20.0079C30.2739 14.3311 25.6768 9.73402 20 9.73402ZM20 26.6693C16.316 26.6693 13.3307 23.684 13.3307 20C13.3307 16.316 16.316 13.3307 20 13.3307C23.684 13.3307 26.6693 16.316 26.6693 20C26.6693 23.684 23.684 26.6693 20 26.6693Z" fill="url(#paint1_linear_5_304)"/>
<path d="M30.6788 11.7189C32.0031 11.7189 33.0766 10.6454 33.0766 9.32116C33.0766 7.9969 32.0031 6.92338 30.6788 6.92338C29.3546 6.92338 28.2811 7.9969 28.2811 9.32116C28.2811 10.6454 29.3546 11.7189 30.6788 11.7189Z" fill="#9747FF"/>
</g>
<defs>
<linearGradient id="paint0_linear_5_304" x1="20.008" y1="0" x2="20.008" y2="40.0079" gradientUnits="userSpaceOnUse">
<stop stop-color="#D66EFF"/>
<stop offset="1" stop-color="#FFC44D"/>
</linearGradient>
<linearGradient id="paint1_linear_5_304" x1="20" y1="9.73402" x2="20" y2="30.2818" gradientUnits="userSpaceOnUse">
<stop stop-color="#7B61FF"/>
<stop offset="1" stop-color="#FF5500"/>
</linearGradient>
<clipPath id="clip0_5_304">
<rect width="40" height="40" fill="white"/>
</clipPath>
</defs>
</svg></a>


    <a target="blank" href="www.linkedin.com/in/salehsarlak"><svg width="40" height="40" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M37.0472 0H2.95278C2.16965 0 1.4186 0.311096 0.864849 0.864849C0.311096 1.4186 0 2.16965 0 2.95278V37.0472C0 37.8303 0.311096 38.5814 0.864849 39.1352C1.4186 39.6889 2.16965 40 2.95278 40H37.0472C37.8303 40 38.5814 39.6889 39.1352 39.1352C39.6889 38.5814 40 37.8303 40 37.0472V2.95278C40 2.16965 39.6889 1.4186 39.1352 0.864849C38.5814 0.311096 37.8303 0 37.0472 0ZM11.9222 34.075H5.90833V14.9722H11.9222V34.075ZM8.91111 12.325C8.22894 12.3212 7.56319 12.1153 6.99789 11.7335C6.43259 11.3516 5.99307 10.8109 5.7348 10.1795C5.47652 9.54808 5.41108 8.85432 5.54672 8.18576C5.68236 7.5172 6.013 6.90379 6.49693 6.42297C6.98085 5.94214 7.59636 5.61544 8.26578 5.4841C8.9352 5.35276 9.62852 5.42266 10.2583 5.68498C10.888 5.9473 11.4259 6.39028 11.8041 6.95802C12.1823 7.52576 12.3839 8.19282 12.3833 8.875C12.3898 9.33172 12.3042 9.78506 12.1317 10.208C11.9592 10.6309 11.7033 11.0148 11.3793 11.3368C11.0553 11.6587 10.6697 11.9121 10.2457 12.0819C9.82167 12.2517 9.36778 12.3344 8.91111 12.325ZM34.0889 34.0917H28.0778V23.6556C28.0778 20.5778 26.7694 19.6278 25.0806 19.6278C23.2972 19.6278 21.5472 20.9722 21.5472 23.7333V34.0917H15.5333V14.9861H21.3167V17.6333H21.3944C21.975 16.4583 24.0083 14.45 27.1111 14.45C30.4667 14.45 34.0917 16.4417 34.0917 22.275L34.0889 34.0917Z" fill="#0A66C2"/>
</svg></a>

<a target="blank" href="https://wa.me/989940097764"><svg width="40" height="40" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
<rect width="40" height="40" rx="20" fill="url(#paint0_linear_13_305)"/>
<path d="M7.86829 31.6358L9.58318 25.4085C8.52296 23.5807 7.96678 21.5107 7.97257 19.3945C7.97257 12.7636 13.3953 7.37241 20.0521 7.37241C23.2849 7.37241 26.3207 8.62363 28.5976 10.8954C30.8802 13.1673 32.1374 16.1886 32.1317 19.4003C32.1317 26.0312 26.7089 31.4225 20.0463 31.4225H20.0405C18.0186 31.4225 16.0314 30.915 14.2644 29.9579L7.86829 31.6358ZM14.5714 27.7841L14.9364 28.0032C16.4775 28.9142 18.2445 29.3928 20.0463 29.3986H20.0521C25.5849 29.3986 30.0923 24.9184 30.0923 19.4061C30.0923 16.7364 29.0495 14.2282 27.155 12.3369C25.2605 10.4457 22.7345 9.40781 20.0521 9.40781C14.5193 9.40204 10.0119 13.8822 10.0119 19.3945C10.0119 21.28 10.5391 23.1194 11.5472 24.7108L11.7847 25.0914L10.7709 28.7759L14.5714 27.7841Z" fill="white"/>
<path d="M8.29126 31.2149L9.94821 25.2009C8.92276 23.4423 8.38396 21.4415 8.38396 19.4003C8.38975 13 13.6213 7.79332 20.0522 7.79332C23.1749 7.79332 26.1006 9.00418 28.3022 11.1953C30.5037 13.3864 31.7146 16.304 31.7146 19.4061C31.7146 25.8064 26.4772 31.0131 20.0522 31.0131H20.0464C18.0939 31.0131 16.1763 30.523 14.473 29.6004L8.29126 31.2149Z" fill="url(#paint1_linear_13_305)"/>
<path d="M7.86829 31.6358L9.58318 25.4085C8.52296 23.5807 7.96678 21.5107 7.97257 19.3945C7.97257 12.7636 13.3953 7.37241 20.0521 7.37241C23.2849 7.37241 26.3207 8.62363 28.5976 10.8954C30.8802 13.1673 32.1374 16.1886 32.1317 19.4003C32.1317 26.0312 26.7089 31.4225 20.0463 31.4225H20.0405C18.0186 31.4225 16.0314 30.915 14.2644 29.9579L7.86829 31.6358ZM14.5714 27.7841L14.9364 28.0032C16.4775 28.9142 18.2445 29.3928 20.0463 29.3986H20.0521C25.5849 29.3986 30.0923 24.9184 30.0923 19.4061C30.0923 16.7364 29.0495 14.2282 27.155 12.3369C25.2605 10.4457 22.7345 9.40781 20.0521 9.40781C14.5193 9.40204 10.0119 13.8822 10.0119 19.3945C10.0119 21.28 10.5391 23.1194 11.5472 24.7108L11.7847 25.0914L10.7709 28.7759L14.5714 27.7841Z" fill="url(#paint2_linear_13_305)"/>
<path fill-rule="evenodd" clip-rule="evenodd" d="M17.0336 14.3666C16.8077 13.8649 16.5701 13.8534 16.3558 13.8476C16.182 13.8419 15.9792 13.8419 15.7764 13.8419C15.5736 13.8419 15.2492 13.9168 14.9711 14.2167C14.693 14.5165 13.9167 15.243 13.9167 16.7249C13.9167 18.201 15.0001 19.631 15.1507 19.8328C15.3013 20.0346 17.2422 23.1655 20.307 24.3706C22.8561 25.3739 23.3775 25.1721 23.9279 25.1202C24.4783 25.0683 25.7123 24.3937 25.9673 23.6902C26.2164 22.9868 26.2164 22.3871 26.1411 22.2603C26.0658 22.1334 25.863 22.0584 25.5617 21.9085C25.2604 21.7586 23.7773 21.0321 23.4992 20.9283C23.2211 20.8303 23.0183 20.7784 22.8214 21.0782C22.6186 21.3781 22.0392 22.0527 21.8654 22.2545C21.6916 22.4563 21.512 22.4794 21.2108 22.3295C20.9095 22.1795 19.9362 21.8624 18.7833 20.8361C17.8853 20.0403 17.2769 19.0544 17.1031 18.7545C16.9293 18.4547 17.0858 18.2932 17.2364 18.1433C17.3696 18.0107 17.5377 17.7916 17.6883 17.6186C17.8389 17.4456 17.8911 17.3188 17.9895 17.117C18.088 16.9152 18.0417 16.7422 17.9664 16.5923C17.8911 16.4481 17.3001 14.9605 17.0336 14.3666Z" fill="white"/>
<defs>
<linearGradient id="paint0_linear_13_305" x1="19.999" y1="39.998" x2="19.999" y2="-0.0013995" gradientUnits="userSpaceOnUse">
<stop stop-color="#20B038"/>
<stop offset="1" stop-color="#60D66A"/>
</linearGradient>
<linearGradient id="paint1_linear_13_305" x1="20.0023" y1="31.2137" x2="20.0023" y2="7.7925" gradientUnits="userSpaceOnUse">
<stop stop-color="#20B038"/>
<stop offset="1" stop-color="#60D66A"/>
</linearGradient>
<linearGradient id="paint2_linear_13_305" x1="20.0023" y1="31.6335" x2="20.0023" y2="7.37241" gradientUnits="userSpaceOnUse">
<stop stop-color="#F9F9F9"/>
<stop offset="1" stop-color="white"/>
</linearGradient>
</defs>
</svg></a>

</div>
<div class="action-btn">
    <a target="blank" href="tarhfam.ir" class="first"> <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#ffffff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-move-right"><path d="M18 8L22 12L18 16"/><path d="M2 12H22"/></svg> Let's build something</a>
    <a target="blank" href="https://wa.me/989940097764" class="second">! Send a Message <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="#8C8C8C" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-circle-small"><circle cx="12" cy="12" r="6"/></svg></a>
</div>
                    </div>
                </div>
            </div>
        </div>

</body>
</html>