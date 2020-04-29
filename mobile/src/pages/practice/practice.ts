import { Component } from '@angular/core';
import { IonicPage, NavController, NavParams, ModalOptions, ModalController } from 'ionic-angular';
import { ViewChild } from '@angular/core';
import { Slides } from 'ionic-angular';
import { AlertController } from 'ionic-angular';
import { EndTestMockPage } from '../end-test-mock/end-test-mock';
import { ModalPastPage } from '../modal-past/modal-past';
/**
 * Generated class for the PracticePage page.
 *
 * See https://ionicframework.com/docs/components/#navigation for more info on
 * Ionic pages and navigation.
 */

@IonicPage()
@Component({
  selector: 'page-practice',
  templateUrl: 'practice.html',
})
export class PracticePage {

  buttonColor: string = '#222d32';
  buttonColor2: string = '#fff';
  colorString: string = '#fff';
  colorString2: string = '#000';

  ///questions
  backQuest1:any ;
  backQuest2:any ;
  backQuest3:any ;
  backQuest4:any ;
  backQuest5:any ;
  backQuest6:any ;
  backQuest7:any ;
  backQuest8:any ;
  backQuest9:any ;
  backQuest10:any ;
  backQuest11:any ;
  backQuest12:any ;
  backQuest13:any ;
  backQuest14:any ;
  backQuest15:any ;
  backQuest16:any ;
  backQuest17:any ;
  backQuest18:any ;
  backQuest19:any ;
  backQuest20:any ;

  @ViewChild('slides') slides: Slides;

  gig:any;
  all:any = 20;

  constructor(public navCtrl: NavController, public navParams: NavParams,
    public alertCtrl: AlertController, private modal: ModalController) {

      this.backQuest1 = 0;
      this.backQuest2 = 0;
      this.backQuest3 = 0;
      this.backQuest4 = 0;
      this.backQuest5 = 0;
      this.backQuest6 = 0;
      this.backQuest7 = 0;
      this.backQuest8 = 0;
      this.backQuest9 = 0;
      this.backQuest10 = 0;
      this.backQuest11 = 0;
      this.backQuest12 = 0;
      this.backQuest13 = 0;
      this.backQuest14 = 0;
      this.backQuest15 = 0;
      this.backQuest16 = 0;
      this.backQuest17 = 0;
      this.backQuest18 = 0;
      this.backQuest19 = 0;
      this.backQuest20 = 0;
      
      this.gig = 1;
      this.all = 20;

      //this.openModal();
  }


    
  openModal(){

    const myModalOptions: ModalOptions = {
      showBackdrop: true,
      enableBackdropDismiss: false
    };
    const myModal = this.modal.create(ModalPastPage,myModalOptions);

    myModal.present();

    myModal.onDidDismiss((date)=>{

      
    });
  }
  

  openFilters2(){
    this.buttonColor = '#222d32';
    this.buttonColor2 = '#fff';

    this.colorString = '#fff';
    this.colorString2 = '#000';


    this.gig = 1;
    this.all = 20;

    this.slides.slideTo(0);
    
  }


  updateCucumber(item){

    var ing = this.slides.getActiveIndex();
   // alert(ing);

   if(ing==0){
    this.backQuest1 = 1;
   }else if(ing==1){
    this.backQuest2 = 1;
   }else if(ing==2){
    this.backQuest3 = 1;
  }else if(ing==3){
    this.backQuest4 = 1;
  }else if(ing==4){
    this.backQuest5 = 1;
  }else if(ing==5){
    this.backQuest6 = 1;
  }else if(ing==6){
    this.backQuest7 = 1;
  }else if(ing==7){
    this.backQuest8 = 1;
  }else if(ing==8){
    this.backQuest9 = 1;
  }else if(ing==9){
    this.backQuest10 = 1;
  }else if(ing==10){
    this.backQuest11 = 1;
  }else if(ing==11){
    this.backQuest12 = 1;
  }else if(ing==12){
    this.backQuest13 = 1;
  }else if(ing==13){
    this.backQuest14 = 1;
  }else if(ing==14){
    this.backQuest15 = 1;
  }else if(ing==15){
    this.backQuest16 = 1;
  }else if(ing==16){
    this.backQuest17 = 1;
  }else if(ing==17){
    this.backQuest18 = 1;
  }else if(ing==18){
    this.backQuest19 = 1;
  }else if(ing==19){
    this.backQuest20 = 1;
  }



  }

  openFilters(){

    this.buttonColor = '#fff';
    this.buttonColor2 = '#222d32';

    this.colorString = '#000';
    this.colorString2 = '#fff';
    
    this.gig = 1;
    this.all = 20;

    this.slides.slideTo(0);

  }


  setNum(num)
  {

  
  


    this.slides.slideTo(num-1);
    this.gig = num;

  }
  

  ionViewDidLoad() {
    console.log('ionViewDidLoad PracticePage');
  }

  next() {

    if(this.gig <20){
      this.gig = this.gig +1;
      this.all  = this.all - 1;
      this.slides.slideNext();
     
    }
    

  }



  prev() {

    if(this.gig > 1){
      this.gig = this.gig -1;
    
      this.slides.slidePrev();
     
    }
    
  }

  showConfirm() {
    const confirm = this.alertCtrl.create({
      title: 'Confirm',
      message: 'Are you sure you want to submit?',
      buttons: [
        {
          text: 'No',
          role: 'cancel',
          handler: () => {
            console.log('Disagree clicked');
          }
        },
        {
          text: 'Yes',
          handler: () => {
            
          }
        }
      ]
    });
    confirm.present();
  }

}
