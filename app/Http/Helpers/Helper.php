<?php
   /**
   * Write code on Method
   *
   * @return response()
   */

  // use http facades
  use Illuminate\Support\Facades\Http;

  function currentrate($from = 'INR' , $to = 'USD' , $amount = 100)
  {
    //exchange api url
    $response = Http::get(env('EXCHANGERATE_API'));
    //append base and output currencies
    $from_rate = $response['rates'][$from];
    $to_rate = $response['rates'][$to];
    //calculate exchange and return
    return convert($from, $to , $amount , $from_rate , $to_rate);

  }
  function convert($from, $to , $amount , $from_rate , $to_rate){
    //calculate exchange rate
    $rate = ((float)$to_rate / (float)$from_rate) * $amount;
    //calculate converted amount
    $converted = $rate * $amount;
    // return formattted message
    // can also return json
    $msg = "{$amount} {$from} = {$converted} {$to}";
    //return  values
    $data = [
        "rate" => $rate,
        "converted" => $converted,
        "message" => $msg,
        $from => $amount,
        $to = $converted
    ];
    //return
    return $data;
  }
?>