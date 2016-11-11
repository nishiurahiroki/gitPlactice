function validateExistsUserError(element){
  clearTextError('#id_errorMessage');
  toggleButton('#registButton', false);

  var inputId = element.value;
  $.ajax({
        type: 'GET',
        url: 'existsUser?userId=' + inputId,
        dataType: 'text',
        success: function(response){
          var existsUser = (new Function('return ' + response))()['result'];
          if(existsUser){
            showTextError('#id_errorMessage', 'すでに使用されているユーザーIDです。');
            toggleButton('#registButton', true);
          }
        }
  });
}

/**
  * テキストフィールドのエラーメッセージを表示します。
  * @param 表示対象のテキストフィールド名
  * @param 表示メッセージ
  */
function showTextError(elementName, message){
  $(elementName).html(message);
}

/**
  * テキストフィールドのエラーメッセージをクリアします
  * @param クリア対象のテキストフィールド名
  */
function clearTextError(elementName){
    $(elementName).html('');
}

/**
  * ボタンエレメントを活性、または非活性化します
  * @param ボタンエレメントID
  * @param 活性真偽値 「true」活性 「false」非活性
  */
function toggleButton(elementName, isDisabled){
  $(elementName).prop('disabled', isDisabled);
}
