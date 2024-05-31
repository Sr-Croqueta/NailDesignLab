import { Component, OnInit } from '@angular/core';
import { RouterModule, RouterOutlet } from '@angular/router';
import { CommonModule } from '@angular/common';
import { FormsModule } from '@angular/forms';
import { HttpClientModule } from '@angular/common/http';
import { AuthService } from './auth.service';



@Component({
  selector: 'app-root',
  standalone: true,
  imports: [CommonModule,RouterModule,HttpClientModule, RouterOutlet, FormsModule],
  templateUrl: './app.component.html',
  styleUrl: './app.component.css',
  providers : [AuthService]
})

export class AppComponent implements OnInit{
  user: any = {};
  userEmail: string = '';
  permisos: any = {};
  constructor(public users: AuthService) {}

  ngOnInit(): void {
    this.users.user().subscribe((datos: any) => {
      this.user = datos
        console.log(datos.email);
        if(this.user) {
    
          this.users.permisos(this.user.id_rol).subscribe((datos: any) => {
            this.permisos = datos;
            console.log(this.permisos)
            
          });
          }
      
    });
    console.log(this.user)
  }

  reloadComponent() {
    window.location.reload(); // Recargar la página
    console.log("Recargando AppComponent");
  }

  isEmpty(obj: any) {
    return Object.keys(obj).length === 0;
  }
  logout():void{
    this.users.logout()
    setTimeout(() => {
      this.reloadComponent(); // Llamada al método para recargar AppComponent
    }, 1000); // 500 milisegundos = medio segundo
  
  }
}
