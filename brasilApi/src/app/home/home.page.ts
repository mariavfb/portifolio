import { Component } from '@angular/core';
import { ApiService } from '../service/api.service';
import { cpf } from 'cpf-cnpj-validator';


@Component({
  selector: 'app-home',
  templateUrl: 'home.page.html',
  styleUrls: ['home.page.scss'],
})
export class HomePage {
  cepValue: string = '';
  nome: string = '';
  cel: string = '';
  tel: string = '';
  numero = '';
  complemento = '';
  cepInfo: any;
  cpfDigitado: string = '';
  cpfInvalido = false;
  cpfValido = false;
  cadastrado = false;
  alerta = false;

  constructor(private apiService: ApiService) {
    this.valida();
  }

  cancela() {
    this.cepValue = '';
    this.cepInfo = null;
    this.cpfDigitado = '';
    this.nome = '';
    this.tel = '';
    this.cel = '';
    
    this.cpfInvalido = true;
    this.cpfValido = true;
    this.alerta = false;
    this.cadastrado = false;
    this.numero = '';
    this.complemento = '';
  }

  valida() {
    this.apiService.getCep(this.cepValue).subscribe((data) => {
      this.cepInfo = data;
    });
    if (cpf.isValid(this.cpfDigitado)) {
      this.cpfInvalido = false;
    } else {
      this.cpfInvalido = true;
    }
  }
  
  cadastra() {
    if (this.cpfDigitado === ''|| this.nome === '' || this.tel === '' || this.cel === '' || this.cepValue === '' || this.cpfInvalido) {
      this.alerta = true;
      this.cadastrado = false;
    } else{
      this.alerta = false;
      this.cadastrado = true;
    }
  }

}


