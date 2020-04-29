import { NgModule } from '@angular/core';
import { IonicPageModule } from 'ionic-angular';
import { EndTestMockPage } from './end-test-mock';

@NgModule({
  declarations: [
    EndTestMockPage,
  ],
  imports: [
    IonicPageModule.forChild(EndTestMockPage),
  ],
})
export class EndTestMockPageModule {}
