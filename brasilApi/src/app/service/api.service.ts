import { Injectable } from '@angular/core';
import { HttpClient } from '@angular/common/http';
@Injectable({
  providedIn: 'root'
})
export class ApiService {
  constructor(private http: HttpClient) { }

  getCep(cep: string) {
    return this.http.get(`https://brasilapi.com.br/api/cep/v1/${cep}`);
  }
}
