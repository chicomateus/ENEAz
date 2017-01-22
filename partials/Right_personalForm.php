<div class="row personalInfo-form card">
        <div class="row field">
            <label class="col-xs-12 col-sm-12 col-md-12 col-lg-12" for="">Nome Completo</label>
            <input class="col-xs-12 col-sm-12 col-md-12 col-lg-12" type="text" name="data[name]" autocomplete="off" required="required" placeholder="">
        </div>
        <div class="row field">
            <label class="col-xs-12 col-sm-12 col-md-12 col-lg-12" for="">Email</label>
            <input class="col-xs-12 col-sm-12 col-md-12 col-lg-12" type="email" name="data[email]" autocomplete="off" required="required" placeholder="">
        </div>
        <div class="row field">
            <label class="col-xs-12 col-sm-12 col-md-12 col-lg-12" for="">Telefone</label></label>
            <input class="col-xs-12 col-sm-12 col-md-12 col-lg-12" type="tel" name="data[phone]" autocomplete="off" required="required" placeholder="">
        </div>
        <div class="row field">
            <label class="col-xs-12 col-sm-12 col-md-12 col-lg-12" for="">Ilha</label></label>
            <select name="data[ilha]"  required="required" class="Ilhas-Select col-xs-12 col-sm-12 col-md-12">
               <option value="" disabled selected hidden>Escolha a sua Ilha</option>
            </select>
        </div>
        <div class="row field">
            <label class="col-xs-12 col-sm-12 col-md-12 col-lg-12" for="">Concelho</label></label>
            <select name="data[concelho]"  required="required" class="Concelhos-Select col-xs-12 col-sm-12 col-md-12">
               <option value="" disabled selected hidden>Escolha o seu Concelho</option>
            </select>
        </div>
        <div class="row row field">
          <div class="left">
            <a onclick="NextStep('.personalInfo-form','.PricePlans')"class="button button--border-medium button--text-medium button--text-upper button--size-s">
              <span>Voltar</span></a>
          </div>
          <div class="right">
            <a onclick="NextStep('.personalInfo-form','.gopInfo-form')"class="button button--border-medium button--text-medium button--text-upper button--size-s">
              <span>Seguinte</span>
            </a>
          </div>
        </div>

</div>
