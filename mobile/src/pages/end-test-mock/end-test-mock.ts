import { Component, ViewChild } from '@angular/core';
import { IonicPage, NavController, NavParams, Slides, AlertController } from 'ionic-angular';

/**
 * Generated class for the EndTestMockPage page.
 *
 * See https://ionicframework.com/docs/components/#navigation for more info on
 * Ionic pages and navigation.
 */

@IonicPage()
@Component({
  selector: 'page-end-test-mock',
  templateUrl: 'end-test-mock.html',
})
export class EndTestMockPage {

  @ViewChild('slides') slides: Slides;

  gig:any;

  
  constructor(public navCtrl: NavController, public navParams: NavParams,private alertCtrl: AlertController) {

    this.gig = 1;
  }

  error(){
    let alert = this.alertCtrl.create({
      title: 'Sorry',
      subTitle: 'This is Demo version',
      buttons: ['Ok']
      });
      alert.present();
  }

  next() {

    if(this.gig <20){
      this.gig = this.gig +1;
      this.slides.slideNext();
     
    }
    

  }

  prev() {

    if(this.gig > 1){
      this.gig = this.gig -1;
      this.slides.slidePrev();
     
    } 
  }

}
