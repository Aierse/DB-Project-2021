import FoodItem from "./FoodItem";
import styles from "./FoodList.module.css";
// 과자
import 나쵸 from "../../images/food/snack/나쵸.jpg";
import 프레즐 from "../../images/food/snack/프레즐.jpg";
import 츄러스 from "../../images/food/snack/츄러스.jpg";
// 팝콘
import 오리지널팝콘 from "../../images/food/popcorn/오리지널팝콘.jpg";
import 치즈팝콘 from "../../images/food/popcorn/치즈팝콘.jpg";
import 카라멜팝콘 from "../../images/food/popcorn/카라멜팝콘.jpg";
import 어니언팝콘 from "../../images/food/popcorn/어니언팝콘.jpg";
// 핫도그
import 핫바 from "../../images/food/hotdog/핫바.jpg";
import 핫도그 from "../../images/food/hotdog/핫도그.jpg";
import 어니언핫도그 from "../../images/food/hotdog/어니언핫도그.jpg";
import 아메리칸핫도그 from "../../images/food/hotdog/아메리칸핫도그.jpg";
// 드링크
import 콜라 from "../../images/food/drink/콜라.jpg";
import 사이다 from "../../images/food/drink/사이다.jpg";
import 아메리카노 from "../../images/food/drink/아메리카노.jpg";
import 에스프레소 from "../../images/food/drink/에스프레소.jpg";
import 카페라테 from "../../images/food/drink/카페라테.jpg";
import 카페모카 from "../../images/food/drink/카페모카.jpg";
import 카푸치노 from "../../images/food/drink/카푸치노.jpg";
// 세트
import 세트1 from "../../images/food/set/팝콘+음료2.jpg";
import 세트2 from "../../images/food/set/나쵸+팝콘+음료2.jpg";
import 세트3 from "../../images/food/set/팝콘+핫도그+음료2.jpg";

const list = {
  Snack: [
    { image: 나쵸, name: "나쵸", price: 1500 },
    { image: 프레즐, name: "프레즐", price: 1500 },
    { image: 츄러스, name: "츄러스", price: 1500 },
  ],
  Popcorn: [
    { image: 오리지널팝콘, name: "오리지널 팝콘", price: 3000 },
    { image: 치즈팝콘, name: "치즈 팝콘", price: 3500 },
    { image: 카라멜팝콘, name: "카라멜 팝콘", price: 3500 },
    { image: 어니언팝콘, name: "어니언 팝콘", price: 3500 },
  ],
  Hotdog: [
    { image: 핫바, name: "핫바", price: 2000 },
    { image: 핫도그, name: "핫도그", price: 2000 },
    { image: 어니언핫도그, name: "어니언 핫도그", price: 2500 },
    { image: 아메리칸핫도그, name: "아메리칸 핫도그", price: 3000 },
  ],
  Drink: [
    { image: 콜라, name: "콜라", price: 2000 },
    { image: 사이다, name: "사이다", price: 2000 },
    { image: 아메리카노, name: "아메리카노", price: 2500 },
    { image: 에스프레소, name: "에스프레소", price: 2500 },
    { image: 카페라테, name: "카페라테", price: 3000 },
    { image: 카페모카, name: "카페모카", price: 3500 },
    { image: 카푸치노, name: "카푸치노", price: 3500 },
  ],
  Set: [
    { image: 세트1, name: "팝콘+음료2", price: 7000 },
    { image: 세트2, name: "나쵸+팝콘+음료2", price: 9500 },
    { image: 세트3, name: "팝콘+핫도그+음료2", price: 10000 },
  ],
};

function FoodList({ menu }) {
  return (
    <div className={styles.foodList}>
      {list[menu].map((element, i) => (
        <FoodItem key={i} image={element.image} name={element.name} price={element.price} />
      ))}
    </div>
  );
}

export default FoodList;
