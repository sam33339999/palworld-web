# PAL WORLD


## dataset - 詞綴

- [帕魯詞綴表](https://docs.google.com/spreadsheets/d/1oVlm10d5OqRqVqydwJO8Ww9TV-z6LwuKjLxrSXtypLo/edit#gid=1193192259)
- [帕魯詞綴表-副本](https://docs.google.com/spreadsheets/d/1abcwEaBfzerwBqfJmHYvwvZtI0hLcBcIr1R-8lcTtks/edit#gid=1193192259)

## dataset - 圖鑑

- [帕魯圖鑑 全列表](https://forum.gamer.com.tw/C.php?bsn=71458&snA=11)
- [較全面 - 全英文](https://genshinlab.com/palworld-pals/)

```javascript
let palEle = document.querySelector('#palTable');
let palTrs = [...palEle.querySelectorAll('tr')];

palTrs.map(palTr => {
    let id = palTr.querySelector(`td:nth-child(2)`).textContent;
    let firstCol = palTr.querySelector(`td:nth-child(1)`);
    let img = firstCol.querySelector('img').src;
    let name = firstCol.textContent.trim();
    let element = palTr.querySelector(`td:nth-child(3)`).textContent;
    let skill = palTr.querySelector(`td:nth-child(4)`).textContent;
    let lifeStr = palTr.querySelector(`td:nth-child(5)`).textContent;
    let lifeSkills = lifeStr.split(', ').map(skill => {
        let result = /(?<sk>.+) Lv(?<lv>\d)/.exec(skill)
        let lv = result.groups?.lv;
        let sk = result.groups?.sk;

        return {sk, lv};
    });
    let dropStr = palTr.querySelector(`td:nth-child(6)`).textContent;
    let drops = dropStr.split(', ');

    return {id, img, name, element, skill, lifeSkills, drops}
});
```

## dataset - 配種

- [配種配方表集中串 歡迎大家分享](https://forum.gamer.com.tw/C.php?bsn=71458&snA=179)
- [【情報】配種小整理](https://forum.gamer.com.tw/C.php?bsn=71458&snA=381&tnum=1)

```txt
110B - 喚夜獸 (暗) | 精靈龍+滑水蛇
080B - 水靈龍 (龍) | 喚冬獸+雷冥鳥
```

## dataset - 礦產

- [金屬礦石、純水晶大量產地](https://forum.gamer.com.tw/Co.php?bsn=71458&sn=117)
- [四大礦石的採集地點分享：純水晶，石炭，金屬礦石，帕魯礦](https://forum.gamer.com.tw/C.php?bsn=71458&snA=377)

## dataset - 地圖

- [【情報】網頁全物種出現地圖+全物件、傳點、收集品、洞窟、野王](https://forum.gamer.com.tw/C.php?bsn=71458&snA=253)
- [全物種出現地](https://palworld.th.gl/)
- [全物件、傳點、收集品、洞窟、野王](https://mapgenie.io/palworld/maps/palpagos-islands)




