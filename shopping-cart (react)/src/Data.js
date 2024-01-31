export function filterItems(items, query) {
  query = query.toLowerCase();
  return items.filter((item) =>
    item.name.split(" ").some((word) => word.toLowerCase().startsWith(query))
  );
}

export const products = [
  {
    id: "1",
    name: "Pokukare",
    img: "https://i.imgur.com/pSoGSU2.jpeg",
    origin: "pork",
    taste: "spicy",
    price: "5.00",
  },
  {
    id: "2",
    name: "Siobutagomaitame",
    img: "https://i.imgur.com/YI61way.jpeg",
    origin: "pork",
    taste: "salty",
    price: "3.00",
  },
  {
    id: "3",
    name: "Sichu",
    img: "https://i.imgur.com/y9XNNt1.jpeg",
    origin: "chicken",
    taste: "salty",
    price: "3.00",
  },
  {
    id: "4",
    name: "Peperonchino",
    img: "https://i.imgur.com/e2YDRss.jpeg",
    origin: "pork",
    taste: "salty",
    price: "8.00",
  },
  {
    id: "5",
    name: "Nikujaga",
    img: "https://i.imgur.com/wrWv16U.jpeg",
    origin: "pork",
    taste: "sweet",
    price: "5.00",
  },
  {
    id: "6",
    name: "Torimomosiotareteishoku",
    img: "https://i.imgur.com/nPD5n6N.jpeg",
    origin: "chicken",
    taste: "sour",
    price: "50.00",
  },
];

export const weatherOptions = {
  北海道: [
    { value: "011000", label: "稚内" },
    { value: "012010", label: "旭川" },
    { value: "012020", label: "留萌" },
    { value: "013010", label: "網走" },
    { value: "013020", label: "北見" },
    { value: "013030", label: "紋別" },
    { value: "014010", label: "根室" },
    { value: "014020", label: "釧路" },
    { value: "014030", label: "帯広" },
    { value: "015010", label: "室蘭" },
    { value: "015020", label: "浦河" },
    { value: "016010", label: "札幌" },
    { value: "016020", label: "岩見沢" },
    { value: "016030", label: "倶知安" },
    { value: "017010", label: "函館" },
    { value: "017020", label: "江差" },
  ],
  青森県: [
    { value: "020010", label: "青森" },
    { value: "020020", label: "むつ" },
    { value: "020030", label: "八戸" },
  ],
  岩手県: [
    { value: "030010", label: "盛岡" },
    { value: "030020", label: "宮古" },
    { value: "030030", label: "大船渡" },
  ],
  宮城県: [
    { value: "040010", label: "仙台" },
    { value: "040020", label: "白石" },
  ],
  秋田県: [
    { value: "050010", label: "秋田" },
    { value: "050020", label: "横手" },
  ],
  山形県: [
    { value: "060010", label: "山形" },
    { value: "060020", label: "米沢" },
    { value: "060030", label: "酒田" },
    { value: "060040", label: "新庄" },
  ],
  福島県: [
    { value: "070010", label: "福島" },
    { value: "070020", label: "小名浜" },
    { value: "070030", label: "若松" },
  ],
  茨城県: [
    { value: "080010", label: "水戸" },
    { value: "080020", label: "土浦" },
  ],
  栃木県: [
    { value: "090010", label: "宇都宮" },
    { value: "090020", label: "大田原" },
  ],
  群馬県: [
    { value: "100010", label: "前橋" },
    { value: "100020", label: "みなかみ" },
  ],
  埼玉県: [
    { value: "110010", label: "さいたま" },
    { value: "110020", label: "熊谷" },
    { value: "110030", label: "秩父" },
  ],
  千葉県: [
    { value: "120010", label: "千葉" },
    { value: "120020", label: "銚子" },
    { value: "120030", label: "館山" },
  ],
  東京都: [
    { value: "130010", label: "東京" },
    { value: "130020", label: "大島" },
    { value: "130030", label: "八丈島" },
    { value: "130040", label: "父島" },
  ],
  神奈川県: [
    { value: "140010", label: "横浜" },
    { value: "140020", label: "小田原" },
  ],
  新潟県: [
    { value: "150010", label: "新潟" },
    { value: "150020", label: "長岡" },
    { value: "150030", label: "高田" },
    { value: "150040", label: "相川" },
  ],
  富山県: [
    { value: "160010", label: "富山" },
    { value: "160020", label: "伏木" },
  ],
  石川県: [
    { value: "170010", label: "金沢" },
    { value: "170020", label: "輪島" },
  ],
  福井県: [
    { value: "180010", label: "福井" },
    { value: "180020", label: "敦賀" },
  ],
  山梨県: [
    { value: "190010", label: "甲府" },
    { value: "190020", label: "河口湖" },
  ],
  長野県: [
    { value: "200010", label: "長野" },
    { value: "200020", label: "松本" },
    { value: "200030", label: "飯田" },
  ],
  岐阜県: [
    { value: "210010", label: "岐阜" },
    { value: "210020", label: "高山" },
  ],
  静岡県: [
    { value: "220010", label: "静岡" },
    { value: "220020", label: "網代" },
    { value: "220030", label: "三島" },
    { value: "220040", label: "浜松" },
  ],
  愛知県: [
    { value: "230010", label: "名古屋" },
    { value: "230020", label: "豊橋" },
  ],
  三重県: [
    { value: "240010", label: "津" },
    { value: "240020", label: "尾鷲" },
  ],
  滋賀県: [
    { value: "250010", label: "大津" },
    { value: "250020", label: "彦根" },
  ],
  京都府: [
    { value: "260010", label: "京都" },
    { value: "260020", label: "舞鶴" },
  ],
  大阪府: [{ value: "270000", label: "大阪" }],
  兵庫県: [
    { value: "280010", label: "神戸" },
    { value: "280020", label: "豊岡" },
  ],
  奈良県: [
    { value: "290010", label: "奈良" },
    { value: "290020", label: "風屋" },
  ],
  和歌山県: [
    { value: "300010", label: "和歌山" },
    { value: "300020", label: "潮岬" },
  ],
  鳥取県: [
    { value: "310010", label: "鳥取" },
    { value: "310020", label: "米子" },
  ],
  島根県: [
    { value: "320010", label: "松江" },
    { value: "320020", label: "浜田" },
    { value: "320030", label: "西郷" },
  ],
  岡山県: [
    { value: "330010", label: "岡山" },
    { value: "330020", label: "津山" },
  ],
  広島県: [
    { value: "340010", label: "広島" },
    { value: "340020", label: "庄原" },
  ],
  山口県: [
    { value: "350010", label: "下関" },
    { value: "350020", label: "山口" },
    { value: "350030", label: "柳井" },
    { value: "350040", label: "萩" },
  ],
  徳島県: [
    { value: "360010", label: "徳島" },
    { value: "360020", label: "日和佐" },
  ],
  香川県: [{ value: "370000", label: "高松" }],
  愛媛県: [
    { value: "380010", label: "松山" },
    { value: "380020", label: "新居浜" },
    { value: "380030", label: "宇和島" },
  ],
  高知県: [
    { value: "390010", label: "高知" },
    { value: "390020", label: "室戸岬" },
    { value: "390030", label: "清水" },
  ],
  福岡県: [
    { value: "400010", label: "福岡" },
    { value: "400020", label: "八幡" },
    { value: "400030", label: "飯塚" },
    { value: "400040", label: "久留米" },
  ],
  佐賀県: [
    { value: "410010", label: "佐賀" },
    { value: "410020", label: "伊万里" },
  ],
  長崎県: [
    { value: "420010", label: "長崎" },
    { value: "420020", label: "佐世保" },
    { value: "420030", label: "厳原" },
    { value: "420040", label: "福江" },
  ],
  熊本県: [
    { value: "430010", label: "熊本" },
    { value: "430020", label: "阿蘇乙姫" },
    { value: "430030", label: "牛深" },
    { value: "430040", label: "人吉" },
  ],
  大分県: [
    { value: "440010", label: "大分" },
    { value: "440020", label: "中津" },
    { value: "440030", label: "日田" },
    { value: "440040", label: "佐伯" },
  ],
  宮崎県: [
    { value: "450010", label: "宮崎" },
    { value: "450020", label: "延岡" },
    { value: "450030", label: "都城" },
    { value: "450040", label: "高千穂" },
  ],
  鹿児島県: [
    { value: "460010", label: "鹿児島" },
    { value: "460020", label: "鹿屋" },
    { value: "460030", label: "種子島" },
    { value: "460040", label: "名瀬" },
  ],
  沖縄県: [
    { value: "471010", label: "那覇" },
    { value: "471020", label: "名護" },
    { value: "471030", label: "久米島" },
    { value: "472000", label: "南大東" },
    { value: "473000", label: "宮古島" },
    { value: "474010", label: "石垣島" },
    { value: "474020", label: "与那国島" },
  ],
};
