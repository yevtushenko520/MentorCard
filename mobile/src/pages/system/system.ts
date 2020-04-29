import { Component } from '@angular/core';
import { IonicPage, NavController, NavParams } from 'ionic-angular';
import { AlertController } from 'ionic-angular';
/**
 * Generated class for the SystemPage page.
 *
 * See https://ionicframework.com/docs/components/#navigation for more info on
 * Ionic pages and navigation.
 */

@IonicPage()
@Component({
  selector: 'page-system',
  templateUrl: 'system.html',
})
export class SystemPage {

  constructor(public navCtrl: NavController, public navParams: NavParams,public alertCtrl: AlertController) {
  }

  ionViewDidLoad() {
    console.log('ionViewDidLoad SystemPage');
  }

  showAlert() {
    const alert = this.alertCtrl.create({
      title: 'Tip!',
      subTitle: 'MentorLimited automatically synchronizes your data with the cloud. This gives you access to the same records from any device. Here you have the possibility to synchronize your data manuality with the cloud.  The last synchronization look place on 08/29/2018 03:58:11 pm',
      buttons: ['OK']
    });
    alert.present();
  }

  presentError() {
    let alert = this.alertCtrl.create({
    title: 'Sorry',
    subTitle: 'This is Demo version',
    buttons: ['Ok']
    });
    alert.present();
    }

}
