import Header from "../components/layouts/Header";
import Main from "../pages/food/Main";
import Body from "../components/layouts/Body";

function Food() {
  return (
    <div>
      <Header />
      <Body main={<Main />} />
    </div>
  );
}

export default Food;
