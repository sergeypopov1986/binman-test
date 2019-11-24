<?
require 'ShortLink.php';
$sh = new ShortLink();
$result = ['success' => true , 'data' => []];
if(isset($_REQUEST['action'])) {
    switch ($_REQUEST['action'])
    {
        case 'getLink':
            $url = htmlspecialchars($_REQUEST['URL']);
            if($url) {
                $short = $sh->generate($url);
                $result['data']['link'] = $_SERVER['HTTP_HOST'].'/'.$short;
            }
            break;
    }
}
echo json_encode($result);

