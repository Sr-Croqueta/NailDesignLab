import { Routes } from '@angular/router';
import { LoginComponent } from './login/login.component';
import { PerfilComponent } from './perfil/perfil.component';
import{TiendasComponent} from './tiendas/tiendas.component';
import{CanvasComponent} from './canvas/canvas.component';
import { RegistrotiendaComponent } from './registrotienda/registrotienda.component';
import { DisenomaniComponent } from './disenomani/disenomani.component';
import { DisponiblesComponent } from './disponibles/disponibles.component';
import { DisenocliComponent } from './disenocli/disenocli.component';
import { EncargosComponent } from './encargos/encargos.component';
export const routes: Routes = [ 
    {path: "",redirectTo:"Tiendas", pathMatch:"full"},
    {path:"login",component:LoginComponent},
    {path:"Perfil", component:PerfilComponent},
    {path:"Tiendas", component:TiendasComponent},
    {path:"Canvas", component:CanvasComponent},
    {path:"RegistroTienda", component:RegistrotiendaComponent},
    {path:"DiseñoManicurista", component:DisenomaniComponent},
    {path:"Disponibles", component:DisponiblesComponent},
    {path:"DiseñoCliente", component:DisenocliComponent},
    {path:"Encargos", component:EncargosComponent},



];

