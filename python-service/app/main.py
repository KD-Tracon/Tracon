# python-service/app/main.py
from fastapi import FastAPI, UploadFile, File
from pathlib import Path
import shutil, tempfile

from runner import run_python_job

app = FastAPI()


@app.post("/run")
async def run(file: UploadFile = File(...)):
    """
    受け取った動画ファイルを一時保存し、
    runner.py のロジックで処理して標準出力を JSON で返す。
    """
    # FastAPI の UploadFile は SpooledTemporaryFile を内包しストリーム転送に強い :contentReference[oaicite:2]{index=2}
    with tempfile.NamedTemporaryFile(delete=False, suffix=Path(file.filename).suffix) as t:
        shutil.copyfileobj(file.file, t)
        temp_path = Path(t.name)

    result = run_python_job(str(temp_path))
    temp_path.unlink(missing_ok=True)

    return {"stdout": result}
