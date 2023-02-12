import { initializeApp } from 'firebase/app';

// TODO: Replace the following with your app's Firebase project configuration
const firebaseConfig = {
    //...
};

const app = initializeApp(firebaseConfig);
// facebook login

const FacebookpProvider = new firebase.auth.FacebookAuthProvider();
