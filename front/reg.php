<h1 class="ct">會員註冊</h1>
<table class="all">
   <tr>
      <td class="tt ct">姓名</td>
      <td class="pp"><input type="text" name="name" id="name"></td>
   </tr>
   <tr>
      <td class="tt ct">帳號</td>
      <td class="pp">
         <input type="text" name="acc" id="acc">
         <button onclick="chkAcc()">檢測帳號</button>
      </td>
   </tr>
   <tr>
      <td class="tt ct">密碼</td>
      <td class="pp"><input type="password" name="pw" id="pw"></td>
   </tr>
   <tr>
      <td class="tt ct">電話</td>
      <td class="pp"><input type="text" name="tel" id="tel"></td>
   </tr>
   <tr>
      <td class="tt ct">住址</td>
      <td class="pp"><input type="text" name="addr" id="addr"></td>
   </tr>
   <tr>
      <td class="tt ct">電子信箱</td>
      <td class="pp"><input type="text" name="email" id="email"></td>
   </tr>
</table>
<div class="ct">
   <button onclick="reg()">註冊</button>
   <button onclick="reset()">重製</button>
</div>