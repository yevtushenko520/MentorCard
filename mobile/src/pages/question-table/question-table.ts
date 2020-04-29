import { Component } from '@angular/core';
import { IonicPage, NavController, NavParams, AlertController } from 'ionic-angular';

/**
 * Generated class for the QuestionTablePage page.
 *
 * See https://ionicframework.com/docs/components/#navigation for more info on
 * Ionic pages and navigation.
 */

@IonicPage()
@Component({
  selector: 'page-question-table',
  templateUrl: 'question-table.html',
})
export class QuestionTablePage {

  constructor(public navCtrl: NavController, public navParams: NavParams,public alertCtrl: AlertController) {
  }

  ionViewDidLoad() {
    console.log('ionViewDidLoad QuestionTablePage');
  }

  open(){
    let alert = this.alertCtrl.create();
    alert.setTitle('Which planets have you visited?');

    alert.addInput({
      type: 'checkbox',
      label: 'True answers',
      value: 'value1',
      checked: true
    });

    alert.addInput({
      type: 'checkbox',
      label: 'False answers',
      value: 'value2'
    });


    alert.addInput({
      type: 'checkbox',
      label: 'Not answers',
      value: 'value3'
    });

    alert.addButton('Cancel');
    alert.addButton({
      text: 'Okay',
      handler: data => {
        console.log('Checkbox data:', data);
        this.presentError();
      }
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
