import { Injectable } from '@angular/core';
import {
  HttpRequest,
  HttpHandler,
  HttpEvent,
  HttpInterceptor
} from '@angular/common/http';
import { Observable } from 'rxjs';

@Injectable()
export class JwtAuthInterceptor implements HttpInterceptor {

  jwt = JSON.parse(localStorage.getItem('jwt') as string);

  constructor() {}

  intercept(request: HttpRequest<unknown>, next: HttpHandler): Observable<HttpEvent<unknown>> {
      if (this.jwt) {
      request = request.clone({
        setHeaders: { Authorization: `Bearer ${this.jwt}`}
      });
    }
    return next.handle(request);
  }
}