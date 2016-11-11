window.onload = function(){

  var registSuccessMessage = document.getElementById('registSuccessMessage').value;
  if(isRegistSuccess(registSuccessMessage)){
    alert(registSuccessMessage);
  }

}

/**
  * ユーザー登録が成功したか判定します
  * @param  メッセージ
  * @return 登録が成功していた場合「true」 登録が失敗していた場合「false」を返します
  **/
function isRegistSuccess(message){
  return message;
}
