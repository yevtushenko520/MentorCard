import { Component } from '@angular/core';
import { IonicPage, NavController, NavParams, ViewController } from 'ionic-angular';
import { EndTestMockPage } from '../end-test-mock/end-test-mock';

/**
 * Generated class for the ModalPastPage page.
 *
 * See https://ionicframework.com/docs/components/#navigation for more info on
 * Ionic pages and navigation.
 */

@IonicPage()
@Component({
  selector: 'page-modal-past',
  templateUrl: 'modal-past.html',
})
export class ModalPastPage {

  constructor(public navCtrl: NavController, public navParams: NavParams, public view:ViewController) {
  }

  closemodal(){
this.view.dismiss();
  }


  yes(){
    this.view.dismiss();
  }

  no(){
    this.view.dismiss();
  }


}
