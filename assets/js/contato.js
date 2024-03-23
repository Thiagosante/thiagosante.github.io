const nodemailer = require('nodemailer');

const receivingEmailAddress = 'thiagosante@gmail.com';

const transporter = nodemailer.createTransport({
  service: 'gmail',
  auth: {
    user: 'seuemail@gmail.com',
    pass: 'suasenha'
  }
});

const mailOptions = {
  from: 'seuemail@gmail.com',
  to: receivingEmailAddress,
  subject: req.body.assunto,
  text: `From: ${req.body.nome}\nEmail: ${req.body.email}\nMessage: ${req.body.message}`
};

transporter.sendMail(mailOptions, function(error, info){
  if (error) {
    console.log(error);
    res.send('error');
  } else {
    console.log('Email sent: ' + info.response);
    res.send('success');
  }
});
