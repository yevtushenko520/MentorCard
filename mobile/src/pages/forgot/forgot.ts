import { Component } from '@angular/core';
import { IonicPage, NavController, NavParams } from 'ionic-angular';
import { FormGroup, Validators, FormBuilder } from '@angular/forms';
import { LoginPage } from '../login/login';

/**
 * Generated class for the ForgotPage page.
 *
 * See https://ionicframework.com/docs/components/#navigation for more info on
 * Ionic pages and navigation.
 */

@IonicPage()
@Component({
  selector: 'page-forgot',
  templateUrl: 'forgot.html',
})
export class ForgotPage {

  forgetData:any= {email : ''}
  authForm : FormGroup;
  email: string;
  constructor(public navCtrl: NavController, public navParams: NavParams,public fb: FormBuilder) {
    this.authForm = this.fb.group({
      'email' : [null, Validators.compose([Validators.required])],
    });

    //this.email = this.authForm.controls['email'];
  }

  ionViewDidLoad() {
    console.log('ionViewDidLoad ForgotPage');
  }

  moveToForgot(){
    this.navCtrl.setRoot(LoginPage);
  }

}
