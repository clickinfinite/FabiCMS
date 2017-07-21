<form action = '#' method='post'>
  <fieldset>
    <legend>Контактная информация</legend>
{$.errors->first('email')}
    <p><label for="name">Имя <em>*</em></label><input name='name' type="text" id="name"></p>
    <p><label for="email">E-mail</label><input name ='email' type="text" id="email"></p>
    <p><label for="email">E-mail 2</label><input name ='my' type="text" id="email"></p>
     <input type="checkbox" id="subscribeNews" name="rules" value="yes">
  </fieldset>
    <p><input name="submit" type="submit" value="Отправить"></p>
</form>



