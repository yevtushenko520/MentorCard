import { NgModule } from '@angular/core';
import { IonicPageModule } from 'ionic-angular';
import { ModalPastPage } from './modal-past';

@NgModule({
  declarations: [
    ModalPastPage,
  ],
  imports: [
    IonicPageModule.forChild(ModalPastPage),
  ],
})
export class ModalPastPageModule {}
