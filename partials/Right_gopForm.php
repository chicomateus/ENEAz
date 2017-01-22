<div class="row gopInfo-form card">
        <div class="row field">
            <label class="col-xs-12 col-sm-12 col-md-12 col-lg-12" for="">Nº Cartão de Cidadão</label>
            <input class="col-xs-12 col-sm-12 col-md-12 col-lg-12" type="number" name="data[cc]" autocomplete="off" autofocus required="required" placeholder="" >
        </div>
        <div class="row field">
            <label class="col-xs-12 col-sm-12 col-md-12 col-lg-12" for="">Nº Identificação Fiscal</label>
            <input class="col-xs-12 col-sm-12 col-md-12 col-lg-12" type="number" name="data[nif]" autocomplete="off" required="required" placeholder="">
        </div>
        <div class="row field row fieldCurso">
            <label class="col-xs-12 col-sm-12 col-md-12 col-lg-12" for="">Curso a Frequentar</label></label>
            <input class="col-xs-12 col-sm-12 col-md-12 col-lg-12" type="text" name="data[curso]"autocomplete="off" placeholder="">
        </div>
        <div class="row field row fieldUni">
            <label class="col-xs-12 col-sm-12 col-md-12 col-lg-12" for="">Universidade</label></label>
            <input class="col-xs-12 col-sm-12 col-md-12 col-lg-12" type="text" name="data[universidade]" autocomplete="off"  placeholder="ou outra Instituição de Ensino">
        </div>
        <div class="row field">
            <label class="col-xs-12 col-sm-12 col-md-12 col-lg-12" for="">Alojamento</label></label>
            <select name="data[alojamento]"  required="required" class="col-xs-12 col-sm-12 col-md-12">
               <option value="" disabled selected hidden>Alojamento?</option>
               <option value="Sim">Sim</option>
                <option value="Não">Não</option>
            </select>
        </div>
        <div class="row field row fieldSocial">
            <label class="col-xs-12 col-sm-12 col-md-12 col-lg-12" for="">A tua conta do Linkedin</label></label>
            <input class="col-xs-12 col-sm-12 col-md-12 col-lg-12" type="text" name="data[social]"autocomplete="off" placeholder="ou outra rede social">
        </div>
        <div class="row field">
          <div class="left">
            <a onclick="NextStep('.gopInfo-form','.personalInfo-form')"class="button button--border-medium button--text-medium button--text-upper button--size-s">
              <span>Voltar</span>
            </a>
          </div>
          <div class="right">
            <button type="submit" class="button button--border-medium button--text-medium button--text-upper button--size-s">
              <span>Submeter</span></button>
          </div>
        </div>

</div>
