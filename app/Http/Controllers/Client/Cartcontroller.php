<?php

namespace App\Http\Controllers\Client;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Product;
use Session;
use App\CartItem;
use App\Order;
use App\OrderDetail;
use DateTime;

class Cartcontroller extends Controller
{
    //
    public function Index()
    {
        $cart = Session::get('Cartsession');
        //dd($cart[0]->Product->ID);
        return view('Pront.Cart.Index',['cart'=>$cart]);
    }
    //private  $CartSession = "Cartsession";
    public function AddItem($productid, $quantity)
    {
        //session()->forget(['Cartsession']);
        $product = Product::find($productid);
        $cartget = Session::get('Cartsession');
        //dd($cartget[0]);
        // foreach ($cartget as $index=>$value)
        // {
        //     dd($value->Product->ID);
        // }
        if($cartget != null)
        {
            
            $list = $cartget;
            //dd( $list);
            
                //dd($item);
            if (array_search($product, array_column($list, 'Product')) !== false)
               
               {
                    foreach ($list as $item)
                    {
                        if($item->Product->ID == $productid)
                        {
                            $item->Quantity += $quantity;
                            //dd($item->Quantity);
                        }

                        
                    }
                    
               }
               else
               {
                    $item = new CartItem;
                    $item->Product = $product;
                    $item->Quantity = $quantity;
                    $list[] =  $item;
                    
               }
           
            Session::put('Cartsession', $list);
            
        }
        else
        {
            $item = new CartItem;
            $item->Product = $product;
            $item->Quantity = $quantity;
            $list = array();
            $list[] = $item;
            Session::put('Cartsession', $list);
        }
        
        //$cart = array("Product" => $product, "Quantity" => $quantity);
        //dd($cart);
        
        $cartget = Session::get('Cartsession');
        //dd($cartget['Product']);
        //dd($product);
       $cartget1 = Session::get('Cartsession');
       //dd($cartget1[0]->Product);
        return redirect()->action('Client\Cartcontroller@Index');
        //return view('Pront.Cart.Index', );
    }
    public function Update(Request $request)
    {
        $list = Session::get('Cartsession');
        $data= $request->cart;
        $i = 0;
        foreach ($list as $item)
        {
           if($item->Product->ID == $data[$i]['ProductId'])
           {

                $item->Quantity = $data[$i]['Quantity'];
                //dd($item->Quantity);
                
           }
           $i++;
           
        }
        Session::put('Cartsession', $list);



        // $cartget['Quantity'] = $data[0]['Quantity'];
        // Session::put('Cartsession', $cartget);
        $cartget = Session::get('Cartsession');

      return ['status' => true];
    }
    public function DeleteAll(Request $request)
    {

        Session::forget('Cartsession');
        
        return ['status' => true];
    }
    public function Delete(Request $request)
    {
        //$productid = Product::find($request->id);
        $getsession = Session::get('Cartsession');
        if($getsession != null)
        {
            foreach ($getsession as $index=>$value)
            {
                if($value->Product->ID == $request->id)
                {
                    unset($getsession[$index]);
                    Session::put('Cartsession', $getsession);
                    $cartget = Session::get('Cartsession');
                    return ['status' => true, 'data'=>$cartget];
                }
            }

        }  
    }
    public function GetPayment()
    {
        $cart = Session::get('Cartsession');
        if( $cart != null)
        {
            return view('Pront.Cart.Payment', ['cart'=>$cart]);
        }
        
    }
    public function PostPayment(Request $request)
    {
        //$shipName, $mobile, $address, $email
        //dd($request->shipName);
        //CustomName    ShipMobile  ShipAddress ShipEmail
        $order = new Order;
        $order->CustomName = $request->shipName;
        $order->ShipMobile = $request->mobile;
        $order->ShipAddress = $request->address;
        $order->ShipEmail = $request->email;
        
        $cart = Session::get('Cartsession');

        if($cart != null)
        {
            try
            {
                $order->save();
                $orderid = $order->id;
                $total =0;
                //dd($order);
                foreach ($cart as $index => $value)
                {
                    //ProductID OrderID Quantity    Price

                    $orderdetail = new OrderDetail;
                    $orderdetail->OrderID = $orderid;
                    $orderdetail->ProductID = $value->Product->ID;
                    $orderdetail->Quantity = $value->Quantity;
                    $orderdetail->Price = $value->Product->Price;
                    $orderdetail->save();
                    $total += $value->Quantity * $value->Product->Price;
                }
            }
            catch(xception $e)
            {
                return $e;
            }
            
        }
        $datetime = getdate();
        switch ($datetime['weekday']) {
    case "Monday":
        $thu = 'thứ hai';
        break;
    case "Tuesday":
        $thu = 'thứ ba';
        break;
    case "Wednesday":
        $thu = 'thứ tư';
        break;
    case "Thursday":
        $thu = 'thứ năm';
        break;
        case "Friday":
        $thu = 'thứ sáu';
        break;
        
        case "Saturday":
        $thu = 'thứ bảy';
        break;
        case "Sunday":
        $thu = 'Chủ nhật';
        break;
    default:
        ;
}
       
        //dd($datetime);
        return view('Pront.Cart.thankyou', ['order'=>$order, 'orderdetail'=> $orderdetail, 'datetime'=>$datetime, 'thu'=>$thu, 'total'=>$total]);
    }
    
}
