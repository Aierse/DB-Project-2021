import Aside from "./parts/Aside";
import styles from "./Body.module.css";

function Body({ main }) {
  return (
    <div className={styles.body}>
      <Aside />
      {main}
    </div>
  );
}

export default Body;
