# python-service/app/runner.py
"""
ここに本番用の Python 処理を実装する。
サンプルでは subprocess で簡易メッセージを返すだけ。
"""

import subprocess, shlex


def run_python_job(video_path: str) -> str:
    cmd = shlex.split(
        f"python3 -c 'print(\"Processed {video_path}\")'"
    )
    return subprocess.check_output(cmd, text=True).strip()
