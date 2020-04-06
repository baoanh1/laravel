<?php
namespace App\Helper;
function message_pop_up_window($message)
{
  $display = '
  <a class="popup_message" id="popup_message" data-toggle="modal" data-target="#message" href="#"></a>
  <div class="modal fade" id="message" role="dialog">
        <div class="modal-dialog modal-md">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title">Messsage </h4>
            </div>
            <div class="modal-body">
              <p>'.$message.'</p>
            </div>
          </div>
        </div>
      </div>
    </div>';
  return $display;
}

class helpers{

    public $cates;
    
    public function treeCate($data, $parent = 0)
    {
      static $count = 0;
      $count++;
       foreach ($data as $key => $val) {
         
          $id = $val["ID"];
          $name = $val["Name"];
          
          if($val["ParentID"]==$parent)
          {
             
             echo $count;
             $this->treeCate($data,$id);
          } 
       }
       
    }
}