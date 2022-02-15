<h1 class="ct">商品分類</h1>
<div class="ct">新增大分類
   <input type="text" name="big" id="big">
   <button onclick='newBig()'>新增</button>
</div>
<div class="ct">新增中分類
   <select name="parent" id="parent"></select>
   <input type="text" name="mid" id="mid">
   <button onclick='newMid()'>新增</button>
</div>
<!-- 分類區 -->
<hr>
<h1 class="ct">商品管理</h1>
<div class="ct"><button>新增商品</button></div>
<table class="all">
   <tr class="tt ct">
      <td>編號</td>
      <td>商品名稱</td>
      <td>庫存量</td>
      <td>狀態</td>
      <td>操作</td>
   </tr>
   <tr class="pp ct">
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td>
         <button>修改</button>
         <button onclick="del('type')">刪除</button>
         <button>上架</button>
         <button>下架</button>
      </td>
   </tr>
</table>

<script>
   $("#parent").load("api/get_big.php");
   
   function newBig(){
      let big=$("#big").val();
      $.post("api/new_big.php",{name:big},()=>{
         location.reload();
      })
   }
</script>