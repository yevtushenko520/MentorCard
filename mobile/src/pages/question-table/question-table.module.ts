import { NgModule } from '@angular/core';
import { IonicPageModule } from 'ionic-angular';
import { QuestionTablePage } from './question-table';

@NgModule({
  declarations: [
    QuestionTablePage,
  ],
  imports: [
    IonicPageModule.forChild(QuestionTablePage),
  ],
})
export class QuestionTablePageModule {}
