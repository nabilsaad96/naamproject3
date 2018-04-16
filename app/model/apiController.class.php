<?php

class ApiController {

  //Gets news from an API
  public static function getNews() {
    //The API call
    $apiLoc = 'https://newsapi.org/v2/everything?q=WWII&sources=google-news&apiKey=cd08af2c62d844a2bd72d33adb258aac';
    $jsonData = json_decode(file_get_contents($apiLoc));
    //Setup return
    $status = $jsonData->{'status'};

    $articles = $jsonData->{'articles'};
    $article0 = $articles[0];
    $article1 = $articles[1];
    $article2 = $articles[2];
    $article3 = $articles[3];

    $article0Title = $article0->{'title'};
    $article1Title = $article1->{'title'};
    $article2Title = $article2->{'title'};
    $article3Title = $article3->{'title'};

    $article0URL = $article0->{'url'};
    $article1URL = $article1->{'url'};
    $article2URL = $article2->{'url'};
    $article3URL = $article3->{'url'};

    $newsData = array(
      'status' => $status,
      'a0t' => $article0Title,
      'a0u' => $article0URL,
      'a1t' => $article1Title,
      'a1u' => $article1URL,
      'a2t' => $article2Title,
      'a2u' => $article2URL,
      'a3t' => $article3Title,
      'a3u' => $article3URL
    );

    return $newsData;

  }

  //Check the input text for profanity
  public static function getProfanity($inputString){
    //the API call
    //$apiLoc = urlencode($api);
    //$apiLoc = "http://www.purgomalum.com/service/plain?text=testing%20All";
    $apiLoc = "http://www.purgomalum.com/service/plain?text=".$inputString;
    $apiLoc = str_replace(' ', '%20', $apiLoc);
    $data = file_get_contents($apiLoc);
    return $data;
  }
}
