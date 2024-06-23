let runningTotal = 0;
let buffer = "0";
let previousOperator;

const screen = document.querySelector('.screen');

function buttonClick(value){
    if(isNaN(value)){
        handleSymbol(value);
    }    
    else{
        handleNumber(value);
    }
    screen.innerText = buffer;

// Eğer tıklanan değer bir sayı değilse (isNaN(value) kontrolü ile kontrol edilir), 
// handleSymbol fonksiyonu çağrılır. Bu, sembollerin (operatörler gibi) işlenmesinden sorumludur.

// Eğer tıklanan değer bir sayı ise, handleNumber fonksiyonu çağrılır. Bu, sayıların işlenmesinden sorumludur.

// Son olarak, screen.innerText kullanılarak ekranın içeriği, buffer'daki değere eşitlenir.
// Bu, kullanıcının yaptığı işlemlerin sonucunu ekranda gösterir.

// Bu fonksiyonun, hesap makinesi düğmelerine tıklama işlemlerini işlemek için bir olay dinleyicisi olarak kullanılabileceği düşünülebilir.
// Örneğin, bir sayfa yüklendiğinde veya bir düğmeye tıklandığında bu fonksiyon çağrılabilir. Bu sayede kullanıcıların girdileri işlenir ve ekrana yansıtılır.
}

function handleSymbol(symbol){
    switch(symbol){
        case 'C':
            buffer = '0';
            runningTotal = 0;
            break;
        case '=':
            if(previousOperator === null){
                return
            }
            flushOperation(parseInt(buffer));
            previousOperator = null;
            buffer = runningTotal;
            runningTotal = 0;
            break;
        case '←':
            if(buffer.length === 1){
                buffer = '0';
            }else{
                buffer = buffer.substring(0, buffer.length - 1);
            }
            break;
        case '+':
        case '-':
        case '×':
        case '÷':
            handleMath(symbol);
            break;
    }
//     handleSymbol fonksiyonu, hesap makinesi düğmelerine tıklama işlemlerinde sembollerin işlenmesinden sorumludur. Gelen sembol değerine göre farklı işlemler gerçekleştirir.

//     'C' sembolü: Hesap makinesini sıfırlar. buffer ve runningTotal sıfırlanır. Böylece kullanıcı ekranı temizler.

//     '=' sembolü: Eğer önceki bir operatör varsa, yani hesaplamaya devam edilmek isteniyorsa, flushOperation fonksiyonunu çağırır. 
//      Bu, önceki işlemi gerçekleştirir ve sonucu buffer'dan alır. Ardından buffer ve runningTotal sıfırlanır. Sonuç olarak, kullanıcının işlemi sonlandırması ve sonucu görmesi sağlanır.

//     '←' sembolü: Kullanıcının son karakteri silmesini sağlar. Eğer buffer'ın uzunluğu 1 ise, yani sadece bir karakter varsa, buffer'ı sıfırlar, aksi halde son karakteri siler.

//     Matematiksel operatörler ('+', '-', '×', '÷'): Bu semboller, handleMath fonksiyonuna yönlendirilir. Bu fonksiyon, ilgili matematiksel işlemi gerçekleştirir.
}

function handleMath(symbol){
    if(buffer == "0"){
        return;
    }

    const intBuffer = parseInt(buffer);

    if(runningTotal === 0){
        runningTotal = intBuffer;
    }else{
        flushOperation(intBuffer);
    }
    previousOperator = symbol;
    buffer = '0'; 

//     Eğer buffer sadece "0" ise, yani henüz bir sayı girilmemişse, fonksiyon işlem yapmadan direkt olarak sonlanır (buffer == "0" kontrolü ile).

//     buffer değeri bir sayı ise, parseInt fonksiyonu kullanılarak integer bir değere dönüştürülür ve intBuffer değişkenine atanır.

//     Eğer runningTotal henüz sıfıra eşit değilse, yani önceki bir işlem yapılmışsa, flushOperation fonksiyonu çağrılarak önceki işlem tamamlanır.
//     Bu, kullanıcının ardışık işlemler yapmasını sağlar.

//     Eğer runningTotal henüz sıfıra eşit ise, yani daha önce bir işlem yapılmamışsa, runningTotal değişkenine intBuffer değeri atanır.

//     previousOperator değişkeni, işlemi gerçekleştiren matematiksel operatör ile güncellenir.

//     Son olarak, buffer sıfırlanır, çünkü kullanıcı artık yeni bir sayı girecek ve bu yeni sayı, bu işlemin ilk operandı olacaktır.
}

function flushOperation(intBuffer){
    if(previousOperator === "+"){
        runningTotal += intBuffer;
    }else if(previousOperator === "-"){
        runningTotal -= intBuffer;
    }else if(previousOperator === "×"){
        runningTotal *= intBuffer;
    }else if(previousOperator === "÷"){
        runningTotal /= intBuffer;
    }

    // Bu flushOperation fonksiyonu, önceki bir işlemi tamamlamak için çağrılır. 
    // Bu fonksiyon, previousOperator değişkenindeki işlemi intBuffer değeriyle gerçekleştirir ve sonucu runningTotal değişkenine atar.

    // Eğer önceki operatör "+" ise, runningTotal değişkenine intBuffer değeri eklenir.
    // Eğer önceki operatör "-" ise, runningTotal değişkeninden intBuffer değeri çıkarılır.
    // Eğer önceki operatör "×" ise, runningTotal değişkeni intBuffer değeri ile çarpılır.
    // Eğer önceki operatör "÷" ise, runningTotal değişkeni intBuffer değeri ile bölünür.
}

function handleNumber(numberString){
    if(buffer === "0"){
        buffer = numberString;
    }else{
        buffer += numberString;
    }
//     Bu handleNumber fonksiyonu, kullanıcının sayı tuşlarına tıklamasını işler.

//     Eğer buffer'da şu anda "0" varsa, kullanıcının girdiği sayı, numberString, doğrudan buffer'a atanır. 
//     Bu, kullanıcının ilk basamağı girdiği ve mevcut değerin sıfır olduğu durumu işler.

//     Eğer buffer'da "0" yoksa, yani daha önce bir sayı girilmişse, kullanıcının girdiği sayı, numberString, buffer'a eklenir. 
//     Bu, kullanıcının ardışık basamaklarını girdiği durumu işler.

//     Özetle, bu fonksiyon, kullanıcının ardışık olarak sayı girmesini sağlar. 
//     Örneğin, kullanıcı önce "5" sonra "7" tuşlarına bastığında, buffer'a sırasıyla "5" ve "7" eklenir ve ekranda "57" görünür.
}

function init(){    
    document.querySelector('.calc-buttons').addEventListener('click',function(event){
        buttonClick(event.target.innerText);
    }) 

//     Bu init fonksiyonu, hesap makinesi uygulamasının başlatılması için kullanılır. 
//     Genellikle sayfa yüklendiğinde çağrılır ve hesap makinesi düğmelerine tıklama olayını dinler.

//     document.querySelector('.calc-buttons'): Bu kod, HTML belgesinde sınıf adı .calc-buttons olan bir DOM öğesini seçer. 
//     Bu, genellikle hesap makinesi düğmelerinin bir konteynırını temsil eder.
    
//     .addEventListener('click', function(event) { ... }): Seçilen öğeye bir tıklama olay dinleyicisi eklenir. 
//     Yani, kullanıcı bu öğeye tıkladığında, belirtilen işlev çalışır.
    
//     buttonClick(event.target.innerText): Tıklanan öğenin içeriği (innerText) buttonClick fonksiyonuna iletilir. 
//     Bu, kullanıcının tıkladığı düğmenin değerini işlemek için çağrılan bir fonksiyondur.
}

init();