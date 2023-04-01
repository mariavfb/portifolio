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
  cepInfo: any;
  cpfDigitado: string = '';
  nome: string = '';
  tel: string = '';
  cel: string = '';
  cpfInvalido = false;
  cpfValido = false;
  constructor(private apiService: ApiService) {
    this.cadastra();
  }
  cadastra() {
    this.apiService.getCep(this.cepValue).subscribe((data) => {
      this.cepInfo = data;
    });
    if (cpf.isValid(this.cpfDigitado)) {
      // CPF válido, continue com a lógica 
      this.cpfInvalido = false;
    } else {
      this.cpfInvalido = true;
      // CPF inválido, exiba uma mensagem de erro para o usuário
    }
  }
  cancela(){
    this.cpfDigitado = ' ';
    this.cepValue = ' ';
    this.nome = ' ';
    this.tel = ' ';
    this.cel = ' ';

  }
}

