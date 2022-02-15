<h1 class="ct">商品分類</h1>
<div class="ct">新增大分類
   <input type="text" name="big" id="big">
   <!-- <button onclick='newBig()'>新增</button> -->
   <button onclick="newType('big')">新增</button>
</div>
<div class="ct">新增中分類
   <select name="parent" id="parent"></select>
   <input type="text" name="mid" id="mid">
   <!-- <button onclick='newMid()'>新增</button> -->
   <button onclick="newType('mid')">新增</button>
</div>
<!-- 分類區 -->
<table class="all">
   <?php
      $bigs=$Type->all(['parent'=>0]);
      foreach($bigs as $big){
   ?>

   <tr class="tt">
      <td><?=$big['name'];?></td>
      <td class="ct">
         <button onclick="edit(this,<?=$big['id'];?>)">修改</button>
         <button onclick="del('type',<?=$big['id'];?>)">刪除</button>
      </td>
   </tr>
   <?php
      $mids=$Type->all(['parent'=>$big['id']]);
      if(count($mids)>0){
         foreach($mids as $mid){
   ?>
   <tr class="pp ct">
      <td><?=$mid['name'];?></td>
      <td>
         <button onclick="edit(this,<?=$mid['id'];?>)">修改</button>
         <button onclick="del('type',<?=$mid['id'];?>)">刪除</button>
      </td>
   </tr>
   <?php
         }
      }
   }
   ?>
</table>
<hr>
<h1 class="ct">商品管理</h1>
<div class="ct"><button onclick="location.href='?do=add_goods'">新增商品</button></div>


<table class="all">
   <tr class="tt ct">
      <td>編號</td>
      <td>商品名稱</td>
      <td>庫存量</td>
      <td>狀態</td>
      <td>操作</td>
   </tr>
<?php
$rows=$Goods->all();
foreach($rows as $row){
?>
   <tr class="pp ct">
      <td><?=$row['no'];?></td>
      <td><?=$row['name'];?></td>
      <td><?=$row['stock'];?></td>
      <td><?=($row['sh']==1)?'販賣中':'已下架';?></td>
      <td>
         <button onclick="location.href='?do=edit_goods&id=<?=$row['id'];?>'">修改</button>
         <button onclick="del('goods',<?=$row['id'];?>)">刪除</button>
         <button onclick="show(<?=$row['id'];?>,1)">上架</button>
         <button onclick="show(<?=$row['id'];?>,0)">下架</button>
      </td>
   </tr>
<?php
}
?>
</table>
<script>
   $("#parent").load("api/get_type.php");

   function newType(type){
      let name,parent;
      switch(type){
         case "big":
            name=$("#big").val();
            parent=0;
         break;
         case "mid":
            name=$("#mid").val();
            parent=$("#parent").val();
         break;
      }
      $.post("api/save_type.php",{name,parent},()=>{
         location.reload();
      });
   }

   /*function newBig(){
      let big=$("#big").val();
      $.post("api/save_type.php",{name:big,parent:0},()=>{
         location.reload();
      })
   }
   function newMid(){
      $.post("api/save_type.php",{name:$("#mid").val(),parent:$("#parent").val()},()=>{
         location.reload();
      })
   }*/
   function edit(dom,id){
      let text=$(dom).parent().prev().text();
      let name=prompt("請輸入要修改的分類文字",text);
      if(name!=null){
         $.post("api/save_type.php",{id,name},()=>{
            location.reload();
         })
      }
   }

   function show(id,sh){
      $.post("api/save_goods.php",{id,sh},()=>{
         location.reload();
      })
   }
   /*補充寫法 上面的上下架前面須加上this -> onclick="show(this,<\?=$row['id'];?>,1)"
   function show(dom,id,sh){
    $.post("api/save_goods.php",{id,sh},()=>{
        switch(sh){
            case 1:
                $(dom).parent().prev().text("販售中")
            break;
            case 0:
                $(dom).parent().prev().text("已下架")
            break;
        }

        //location.reload()
    })
   }*/
</script>